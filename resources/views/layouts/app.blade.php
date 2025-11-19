<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex flex-col bg-transparent">

    {{-- Navbar --}}
    <nav class="w-full bg-white shadow-sm py-4 px-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="logo/logo-bps.png" class="h-8" alt="logo">
            <h1 class="font-bold text-lg">Publikasi Digital</h1>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main class="flex-grow bg-transparent">
        @yield('content')
    </main>

    {{-- FOOTER TANPA BORDER --}}
    <footer class="py-4 text-center text-sm text-gray-700 bg-transparent">
        2025 Publikasi Digital – BPS Kabupaten Jember
    </footer>

</body>
</html>
