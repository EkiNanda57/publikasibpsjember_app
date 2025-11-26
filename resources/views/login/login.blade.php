<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('logo/logobps_jember.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-[#fef6e4] via-[#dbeafe] to-[#334b8c]
             transition-colors duration-300
             dark:from-gray-900 dark:via-gray-950 dark:to-gray-800">

    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700">

            <div class="text-center mb-8">
                <span class="text-4xl font-extrabold text-blue-600 dark:text-blue-300">
                    Login
                </span>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Silahkan login terlebih dahulu.
                </p>
            </div>

            @if(session('error_message'))
                <div class="mb-4 p-3 text-sm text-center font-medium rounded-xl bg-red-100 text-red-700">
                    {{ session('error_message') }}
                </div>
            @endif

            <form class="space-y-5" method="POST" action="{{ route('login.attempt') }}">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Username
                    </label>
                    <input type="text" name="username" id="username" placeholder="Masukkan username"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl
                           focus:ring-2 focus:ring-blue-400 focus:border-blue-500
                           dark:bg-gray-700 dark:text-white transition duration-150">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Minimal 8 karakter"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl
                           focus:ring-2 focus:ring-blue-400 focus:border-blue-500
                           dark:bg-gray-700 dark:text-white transition duration-150">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox"
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember" class="ml-2 text-gray-900 dark:text-gray-300">
                            Ingat Saya
                        </label>
                    </div>

                    <a href="{{ route('password.forgot') }}"
                       class="font-medium text-blue-700 hover:text-blue-600 dark:text-blue-300 dark:hover:text-blue-200 transition">
                        Lupa Password?
                    </a>
                </div>

                <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-blue-500 rounded-xl shadow-sm
                               text-sm font-medium text-blue-500 bg-white dark:bg-gray-800
                               hover:bg-blue-500 hover:text-white
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                               transform hover:scale-[1.01] transition duration-200">
                    Login
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                Belum punya akun?
                <a href="{{ route('register') }}"
                   class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 dark:hover:text-blue-300 transition">
                    Daftar Sekarang
                </a>
            </p>

        </div>
    </div>
</body>
</html>
