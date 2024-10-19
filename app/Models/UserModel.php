<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Definisikan tabel yang digunakan (user)
    protected $table = 'user';

    // Tentukan kolom mana yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto', // Kolom foto ditambahkan
    ];

    // Relasi ke tabel kelas (many-to-one)
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Fungsi untuk mendapatkan data user dengan data kelas
    public function getUser($id = null){
        if ($id != null){
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id') // Mengambil relasi kelas
                    ->select('user.*', 'kelas.nama_kelas') // Pilih semua kolom dari tabel user
                    ->where('user.id', $id)
                    ->first(); // Ambil data
        }
        
    }
}
