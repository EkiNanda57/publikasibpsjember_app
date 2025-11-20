<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
</head>

{{-- Pastikan tidak ada margin/padding default di body --}}
<body class="h-screen flex flex-col bg-transparent m-0 p-0 overflow-hidden">

    {{-- Navbar --}}
    <nav class="w-full bg-white shadow-sm py-4 px-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="logo/logo-bps.png" class="h-8" alt="logo">
            <h1 class="font-bold text-lg">Publikasi Digital</h1>
        </div>
    </nav>

    {{-- CONTENT --}}
    {{-- flex-grow memastikan elemen ini mengambil semua ruang vertikal yang tersisa antara Navbar dan Footer --}}
    <main class="flex-grow bg-transparent overflow-y-auto">
        @yield('content')
    </main>

    {{-- FOOTER TANPA BORDER --}}
    <footer class="py-4 text-center text-sm text-gray-700 bg-transparent flex-shrink-0">
        2025 Publikasi Digital - BPS Kabupaten Jember
    </footer>

</body>
</html>