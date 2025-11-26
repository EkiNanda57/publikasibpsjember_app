<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" type="image/png" href="{{ asset('logo/logobps_jember.png') }}">
    @vite('resources/css/app.css')
</head>

<body class="h-screen flex flex-col bg-transparent">

    {{-- NAVBAR PUBLIK --}}
    <nav class="w-full bg-white shadow-sm py-4 px-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo/logo-bps.png') }}" class="h-8" alt="logo">
            <h1 class="font-bold text-lg">Publikasi Digital</h1>
        </div>
    </nav>

    <main class="flex-grow overflow-y-auto">
        @yield('content')
    </main>

    <footer class="py-4 text-center text-sm text-gray-700">
        2025 Publikasi Digital - BPS Kabupaten Jember
    </footer>

</body>

</html>
