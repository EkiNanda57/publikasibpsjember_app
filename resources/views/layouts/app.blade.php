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
            <img src="{{ asset('logo/logo-bps.png') }}" class="h-8" alt="logo">
            <h1 class="font-bold text-lg">Publikasi Digital</h1>
        </div>

        {{-- ICON PINTU + TEKS KELUAR (SEJEJAR) --}}
        <a href="{{ route('logout') }}"
        class="flex items-center gap-2 text-gray-600 hover:text-red-500 transition duration-150"
        title="Logout">

            {{-- ICON --}}
            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25
                        2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M9 12h12m0 0l-3-3m3
                        3l-3 3" />
            </svg>

            {{-- TEKS --}}
            <span class="font-medium">Keluar</span>
        </a>
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