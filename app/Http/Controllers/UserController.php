<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => 'Anisa Mitha Safitri',
            'kelas' => 'A',
            'npm' => '2257051022'
        ];
        return view ('create_user');
    }

    public function store(Request $request){

        $data = [ 
            'nama' => $request->input('nama'), 
            'npm' => $request->input('npm'), 
            'kelas' => $request->input('kelas'), 
        ];
        return view ('profile', $data);
    }
}