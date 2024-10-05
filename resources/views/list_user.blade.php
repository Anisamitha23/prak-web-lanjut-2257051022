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

    <div class="flex items-center justify-center mt-10"> <!-- Menambahkan margin top di sini -->
        <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-4xl transform hover:scale-105 transition-transform duration-300 ease-in-out">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gradient-to-r from-pink-400 to-purple-500 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">NPM</th>
                        <th class="py-3 px-4 text-left">Kelas</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b border-gray-200">
                            <td class="py-3 px-4">{{ $user['id'] }}</td>
                            <td class="py-3 px-4">{{ $user['nama'] }}</td>
                            <td class="py-3 px-4">{{ $user['npm'] }}</td>
                            <td class="py-3 px-4">{{ $user['nama_kelas'] }}</td>
                            <td class="py-3 px-4">
                                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a> | 
                                <a href="#" class="text-red-500 hover:text-red-700">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
@endsection
