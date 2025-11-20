<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('login.register');
    }

    public function store(Request $request)
    {
        // Validasi awal (username + panjang password + beda username)
        $request->validate([
            'username' => 'required|unique:users,username|max:10',
            'password' => 'required|size:8|different:username',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'username.max' => 'Username maksimal 10 karakter.',

            'password.required' => 'Password wajib diisi.',
            'password.size' => 'Password harus tepat 8 karakter.',
            'password.different' => 'Password tidak boleh sama dengan username.',
        ]);

        $password = $request->password;

        // ⚠️ CEK SIMBOL TERLARANG
        if (!preg_match('/^[A-Za-z0-9@._]+$/', $password)) {
            return back()->withErrors(['password' => 'Simbol yang boleh digunakan hanya @ . _'])->withInput();
        }

        // ⚠️ CEK KOMBINASI UNIK (huruf-angka / huruf-simbol / angka-simbol)
        $hasLetter = preg_match('/[A-Za-z]/', $password);
        $hasNumber = preg_match('/[0-9]/', $password);
        $hasSymbol = preg_match('/[@._]/', $password);

        if (
            !(
                ($hasLetter && $hasNumber) ||
                ($hasLetter && $hasSymbol) ||
                ($hasNumber && $hasSymbol)
            )
        ) {
            return back()->withErrors(['password' => 'Password harus unik.'])->withInput();
        }

        // Simpan ke database
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/')->with('success', 'Akun berhasil dibuat, silakan login.');
    }
}
