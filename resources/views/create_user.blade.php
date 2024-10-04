<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anisa Mitha Safitri</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-pink-200 to-purple-300">

    <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
        <form action="{{ route('user.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="relative">
                <input type="text" name="nama" placeholder="Nama" class="w-full py-4 px-5 bg-purple-50 rounded-lg border-2 border-pink-300 focus:outline-none focus:ring-4 focus:ring-pink-400 text-gray-800 font-medium tracking-wide" required>
            </div>
            <div class="relative">
                <input type="text" name="npm" placeholder="NPM" class="w-full py-4 px-5 bg-purple-50 rounded-lg border-2 border-pink-300 focus:outline-none focus:ring-4 focus:ring-pink-400 text-gray-800 font-medium tracking-wide" required>
            </div>
            <div class="relative">
                <input type="text" name="kelas" placeholder="Kelas" class="w-full py-4 px-5 bg-purple-50 rounded-lg border-2 border-pink-300 focus:outline-none focus:ring-4 focus:ring-pink-400 text-gray-800 font-medium tracking-wide" required>
            </div>

            <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-400 to-purple-500 text-white rounded-full shadow-lg font-bold tracking-wide hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-400 transition-colors duration-300">Submit</button>
        </form>
    </div>

</body>
</html>