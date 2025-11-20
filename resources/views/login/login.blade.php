<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* ... Gaya CSS Anda ... */
        html { font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif; }
    </style>
</head>

<body class="bg-gradient-to-br from-green-100 via-orange-100 to-blue-100 transition-colors duration-300
             dark:from-gray-900 dark:via-gray-950 dark:to-gray-800">
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 transform transition duration-500 hover:shadow-2xl">

            <div class="text-center mb-8">
                <span class="text-4xl font-extrabold text-orange-400 dark:text-orange-100">
                    Login
                </span>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Silahkan login terlebih dahulu.
                </p>
            </div>

            {{-- Menggunakan @if (isset(...)) karena variabel ini mungkin tidak ada pada GET request awal --}}
            @if(session('error_message'))
                <div class="mb-4 p-3 text-sm text-center font-medium rounded-xl bg-red-100 text-red-700">
                    {{ session('error_message') }}
                </div>
            @endif

            {{-- Menggunakan route('nama.route') agar lebih aman daripada menulis URL langsung --}}
            <form class="space-y-5" method="POST" action="{{ route('login.attempt') }}">
                @csrf
                {{-- Ini wajib di Laravel untuk keamanan POST request --}}

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Username
                    </label>
                    <input type="text" name="email" id="email" placeholder="Masukkan username"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-white transition duration-150
                           @if(isset($error_message) && strpos($error_message, 'Email-nya') !== false) border-red-500 focus:border-red-500 focus:ring-red-500 @endif"
                           value="{{ $remembered ?? '' }}">
                           {{-- Menggunakan ?? '' untuk memastikan tidak error saat GET request awal --}}
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Minimal 8 karakter"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-white transition duration-150">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                        <label for="remember" class="ml-2 block text-gray-900 dark:text-gray-300">
                            Ingat Saya
                        </label>
                    </div>
                    <a href="{{ route('password.forgot') }}" class="font-medium text-gray-900 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100 transition duration-150">
                        Lupa Password?
                    </a>
                </div>

                <button type="submit" class="w-full flex justify-center py-3 px-4
                            border border-orange-400 rounded-xl shadow-sm text-sm font-medium
                            text-orange-400 bg-white dark:bg-gray-800
                            hover:bg-orange-400 hover:text-white
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400
                            transform hover:scale-[1.01] transition duration-200 ease-in-out">
                    Login
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-orange-600 dark:text-orange-400 hover:text-orange-500 dark:hover:text-orange-300 transition duration-150">
                    Daftar Sekarang
                </a>
            </p>
        </div>
    </div>
</body>
</html>
