<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas'; // Pastikan tabel fakultas sudah sesuai

    protected $fillable = ['nama_fakultas'];

    // Relasi ke model Jurusan
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
}
