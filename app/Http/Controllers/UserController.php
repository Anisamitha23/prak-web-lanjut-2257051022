<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan; // Tambahkan model Jurusan
use App\Models\Fakultas; // Tambahkan Fakultas
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
            'users' => $this->userModel->with(['kelas', 'jurusan.fakultas'])->orderBy('id')->get(),
        ];
        return view('list_user', $data);
    }

    // Menampilkan form untuk membuat user baru
    public function create(){
        $data = [
            'title' => 'Create User',
            'kelas' => Kelas::all(), // Mengambil semua data kelas dari database
            'jurusan' => Jurusan::all(), // Mengambil semua data jurusan dari database
            'fakultas' => Fakultas::all(),
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
            'jurusan_id' => 'required|exists:jurusan,id', // Validasi untuk jurusan_id
            'fakultas_id' => 'required|exists:fakultas,id', // Validasi fakultas
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
            'jurusan_id' => $request->input('jurusan_id'), // Menyimpan jurusan_id
            'foto' => $fotoPath, // Menyimpan path foto
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    
    }

    public function show($id){
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }
        
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }

    public function edit($id){
        $user = $this->userModel->findOrFail($id); // Mengambil data user berdasarkan id

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => Kelas::all(), // Mengambil semua data kelas untuk dipilih
            'jurusan' => Jurusan::all(), // Mengambil semua data jurusan untuk dipilih
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);
    
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusan,id', // Validasi untuk jurusan_id
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Update data user
        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;
        $user->jurusan_id = $request->jurusan_id; // Simpan jurusan_id
    
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && file_exists(public_path('uploads/' . $user->foto))) {
                unlink(public_path('uploads/' . $user->foto));
            }
    
            // Upload file foto baru
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $user->foto = $fileName; // Simpan nama file baru
        }
    
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    

    
    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user/list')->with('success', 'User has been deleted successfully');
    }


}
