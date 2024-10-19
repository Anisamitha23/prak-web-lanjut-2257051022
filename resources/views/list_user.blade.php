@extends('layouts.app') 
@section('content') 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-pink-200 to-purple-300">

    
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-pink-200 to-purple-300">
        <div class="flex items-center justify-center mt-10">
            <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-4xl transform hover:scale-105 transition-transform duration-300 ease-in-out">
                
                <!-- Tombol untuk link ke halaman create user -->
                <a href="{{ route('user.create') }}" class="mb-3 inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-lg hover:bg-green-700 shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Tambah Pengguna Baru
                </a>
                
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gradient-to-r from-pink-400 to-purple-500 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">ID</th>
                            <th class="py-3 px-4 text-left">Nama</th>
                            <th class="py-3 px-4 text-left">NPM</th>
                            <th class="py-3 px-4 text-left">Kelas</th>
                            <th class="py-3 px-4 text-left">Foto</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b border-gray-200">
                                <td class="py-3 px-4">{{ $user->id }}</td>
                                <td class="py-3 px-4">{{ $user->nama }}</td>
                                <td class="py-3 px-4">{{ $user->npm }}</td>
                                <td class="py-3 px-4">{{ $user->kelas->nama_kelas ?? 'Tidak Ada Kelas' }}</td>
                                <td class="py-3 px-4">
                                    @if ($user->foto)
                                        <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Pengguna" class="w-16 h-16 rounded-full object-cover">
                                    @else
                                        <span>Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('user.show', $user->id) }}" class="inline-block px-4 py-2 bg-purple-500 text-white font-bold rounded-lg hover:bg-purple-700 shadow-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                        Detail
                                    </a>
                                    
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('user.edit', $user->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-700 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-700 shadow-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
@endsection
