<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-100 via-orange-100 to-blue-100 transition-colors duration-300
             dark:from-gray-900 dark:via-gray-950 dark:to-gray-800">
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-lg p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 transform transition duration-500 hover:shadow-2xl">

            <div class="text-center mb-8">
                <span class="text-4xl font-extrabold text-orange-400 dark:text-orange-100">
                    Register
                </span>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Buat akun baru untuk masuk.
                </p>
            </div>

            @if(session('success'))
                <div class="mb-4 p-3 text-sm text-center font-medium rounded-xl bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3 text-sm text-center font-medium rounded-xl bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Username
                    </label>
                    <input type="text" name="username" placeholder="Masukkan username"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl
                                  focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                  dark:bg-gray-700 dark:text-white transition duration-150">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Password
                    </label>
                    <input type="password" name="password" placeholder="Minimal 8 karakter"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl
                                  focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                  dark:bg-gray-700 dark:text-white transition duration-150">
                </div>

                <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-orange-400 rounded-xl
                               shadow-sm text-sm font-medium text-orange-400 bg-white dark:bg-gray-800
                               hover:bg-orange-400 hover:text-white focus:outline-none focus:ring-2
                               focus:ring-offset-2 focus:ring-orange-400 transform hover:scale-[1.01]
                               transition duration-200 ease-in-out">
                    Daftar
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                   class="font-medium text-orange-600 dark:text-orange-400 hover:text-orange-500 dark:hover:text-indigo-300 transition duration-150">
                    Login Sekarang
                </a>
            </p>
        </div>
    </div>
</body>
</html>
