<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="icon" type="image/png" href="{{ asset('logo/logobps_jember.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#fef6e4] via-[#dbeafe] to-[#334b8c]
             transition-colors duration-300
             dark:from-gray-900 dark:via-gray-950 dark:to-gray-800
             h-screen overflow-hidden">

    <div class="h-full flex items-center justify-center p-4 sm:p-6">

        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg p-6
                    bg-white dark:bg-gray-800 rounded-2xl shadow-xl
                    border border-gray-100 dark:border-gray-700
                    transform transition duration-500 hover:shadow-2xl">

            <div class="text-center mb-8">
                <span class="text-4xl font-extrabold text-[#334b8c] dark:text-blue-200">
                    Lupa Password?
                </span>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Masukkan password baru untuk mengganti password lama.
                </p>
            </div>

            @if(session('error'))
                <div class="mb-4 p-3 text-sm text-center font-medium rounded-xl
                            bg-red-100 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.forgot.process') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Username
                    </label>
                    <input type="text" name="username" placeholder="Masukkan username"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl
                               focus:ring-2 focus:ring-[#334b8c] focus:border-[#334b8c]
                               dark:bg-gray-700 dark:text-white transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Password Baru
                    </label>
                    <input type="password" name="password" placeholder="Minimal 8 karakter"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl
                               focus:ring-2 focus:ring-[#334b8c] focus:border-[#334b8c]
                               dark:bg-gray-700 dark:text-white transition">
                </div>

                <button type="submit"
                    class="w-full py-3 rounded-xl border border-[#334b8c] text-[#334b8c]
                           hover:bg-[#334b8c] hover:text-white transition font-medium">
                    Simpan Password Baru
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                Kembali ke halaman login?
                <a href="{{ route('login') }}"
                   class="font-medium text-[#334b8c] hover:text-blue-700 dark:text-blue-300 dark:hover:text-blue-200 transition">
                    Login
                </a>
            </p>
        </div>
    </div>

</body>
</html>
