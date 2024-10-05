<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- If using Tailwind through Vite, include the compiled CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 text-gray-900 font-poppins">

    <!-- Main content will be injected here -->
    @yield('content')

    <!-- If using Vite, include the compiled JS -->
    @vite(['resources/js/app.js'])
</body>
</html>