<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara manual
    protected $table = 'jurusan'; // Bukan 'jurusans'

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
