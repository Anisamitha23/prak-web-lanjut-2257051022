<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    public $userModel;

    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }


    public function create($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => 'Anisa Mitha Safitri',
            'kelas' => 'A',
            'npm' => '2257051022'
        ];
        return view ('create_user', [
            'kelas' => Kelas::all(),
        ]);

        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        return view('create_user', $data);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::create($validatedData);

        $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);

        $this->userModel->create($validateData);
        return redirect()->to('/users');

    }

}