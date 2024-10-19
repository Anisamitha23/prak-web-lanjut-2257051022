<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;




class UserController extends Controller
{
    protected $userModel;
    protected $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // Menampilkan daftar pengguna
    public function index(){
        $data = [
            'title' => 'List Users',
            'users' => $this->userModel->with('kelas')->orderBy('id')->get(),
        ];
        return view('list_user', $data);
    }

    // Menampilkan form untuk membuat user baru
    public function create(){
        $data = [
            'title' => 'Create User',
            'kelas' => Kelas::all(), // Mengambil semua data kelas dari database
        ];
        return view('create_user', $data);
    }

    // Menyimpan data user baru
    public function store(Request $request) {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
        ]);

        // Meng-handle upload foto
        $fotoPath = null; // Inisialisasi variabel fotoPath

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Menyimpan file foto di folder 'upload/img'
            $fotoPath = $foto->store('upload/img', 'public'); // menggunakan store() untuk menyimpan file
        }

        // Menyimpan data pengguna ke dalam database
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, // Menyimpan path foto
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');

    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }

}