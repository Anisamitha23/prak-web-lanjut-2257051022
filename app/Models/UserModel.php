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
        'jurusan_id', // Menambahkan jurusan_id
        'foto', // Kolom foto ditambahkan
    ];

    // Relasi ke tabel kelas (many-to-one)
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Relasi ke tabel jurusan (many-to-one)
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    // Fungsi untuk mendapatkan data user dengan data kelas dan jurusan
    public function getUser($id = null){
        if ($id != null){
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id') // Mengambil relasi kelas
                        ->join('jurusan', 'jurusan.id', '=', 'user.jurusan_id') // Mengambil relasi jurusan
                        ->select('user.*', 'kelas.nama_kelas', 'jurusan.nama_jurusan') // Pilih semua kolom dari tabel user, kelas, dan jurusan
                        ->where('user.id', $id)
                        ->first(); // Ambil data
        }
    
    }

}
