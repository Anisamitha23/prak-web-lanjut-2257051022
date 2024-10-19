@extends('layouts.app') 
@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-pink-200 to-purple-300">

    <div class="flex items-center justify-center w-full min-h-screen">
        <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-md transform hover:scale-105 transition-transform duration-300 ease-in-out mt-10">
            
            <h2 class="text-2xl font-semibold mb-5">Create User</h2>

            <!-- Form dengan atribut enctype -->
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5" novalidate>
                @csrf
                <div class="relative">
                    <input type="text" name="nama" placeholder="Nama" class="w-full py-4 px-5 bg-purple-50 rounded-lg border-2 border-pink-300 focus:outline-none focus:ring-4 focus:ring-pink-400 text-gray-800 font-medium tracking-wide" required>
                    @foreach($errors->get('nama') as $msg)
                        <p class="text-red-500 text-xs mt-1 text-left">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="relative">
                    <input type="text" name="npm" placeholder="NPM" class="w-full py-4 px-5 bg-purple-50 rounded-lg border-2 border-pink-300 focus:outline-none focus:ring-4 focus:ring-pink-400 text-gray-800 font-medium tracking-wide" required>
                    @foreach($errors->get('npm') as $msg)
                        <p class="text-red-500 text-xs mt-1 text-left">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="relative">
                    <select name="kelas_id" id="kelas_id" class="w-full py-4 px-5 bg-purple-50 rounded-lg border-2 border-pink-300 focus:outline-none focus:ring-4 focus:ring-pink-400 text-gray-800 font-medium tracking-wide" required>
                        <option value="" disabled selected>Pilih Kelas</option> <!-- Opsi Default -->
                        @foreach ($kelas as $kelasItem)
                        <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                        @endforeach
                    </select>
                    @foreach($errors->get('kelas_id') as $msg)
                        <p class="text-red-500 text-xs mt-1 text-left">{{ $msg }}</p>
                    @endforeach
                </div>

                <!-- Menambahkan input file untuk foto -->
                <div class="relative">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto:</label>
                    <input type="file" id="foto" name="foto" class="w-full py-4 px-5 bg-purple-50 rounded-lg border-2 border-pink-300 focus:outline-none focus:ring-4 focus:ring-pink-400 text-gray-800 font-medium tracking-wide">
                    @foreach($errors->get('foto') as $msg)
                        <p class="text-red-500 text-xs mt-1 text-left">{{ $msg }}</p>
                    @endforeach
                </div>

                <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-400 to-purple-500 text-white rounded-full shadow-lg font-bold tracking-wide hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-400 transition-colors duration-300">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>
@endsection
