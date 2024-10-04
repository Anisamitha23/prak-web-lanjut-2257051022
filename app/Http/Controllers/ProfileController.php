<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        $data = [
            'nama' => 'Anisa Mitha Safitri',
            'kelas' => 'A',
            'npm' => '2257051022'
        ];
        return view('profile', $data);
    }
}


