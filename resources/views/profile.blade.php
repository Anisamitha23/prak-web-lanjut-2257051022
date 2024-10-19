<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center h-screen" style="background: linear-gradient(to bottom right, #FFDFD6, #8EACCD);">

    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md text-center w-full">

        @if ($user)
            <div class="w-32 h-32 mx-auto mb-4 relative">
                @if ($user->foto)
                    <img id="user_image" class="rounded-full border border-gray-300 object-cover w-full h-full" src="{{ asset('storage/' . $user->foto) }}" alt="User Image">
                @else
                    <img id="default_image" class="rounded-full border border-gray-300 object-cover w-full h-full" src="{{ asset('assets/images/default.jpg') }}" alt="Default Image">
                @endif
            </div>

            <div class="space-y-2">
                <div class="bg-purple-200 py-2 px-4 rounded-md text-black font-semibold">
                    {{ $user->nama }}
                </div>
                <div class="bg-purple-200 py-2 px-4 rounded-md text-black font-semibold">
                    {{ $user->npm }}
                </div>
                <div class="bg-purple-200 py-2 px-4 rounded-md text-black font-semibold">
                    {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}
                </div>
            </div>
        @else
            <div class="text-red-500">
                <p>User tidak ditemukan</p>
            </div>
        @endif
    </div>

</body>
</html>
