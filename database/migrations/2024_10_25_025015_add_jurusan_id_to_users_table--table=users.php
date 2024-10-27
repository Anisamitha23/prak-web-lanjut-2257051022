<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->foreignId('jurusan_id') // Membuat kolom jurusan_id
                  ->nullable() // Kolom ini bisa bernilai NULL, tergantung kebutuhan
                  ->constrained('jurusan') // Menetapkan relasi foreign key ke tabel jurusan
                  ->onDelete('cascade'); // Menghapus user jika jurusan terkait dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']); // Menghapus foreign key
            $table->dropColumn('jurusan_id'); // Menghapus kolom jurusan_id
        });
    }
};
