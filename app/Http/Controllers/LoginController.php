<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        $remembered = request()->cookie('remember_username');
        return view('login.login', compact('remembered'));
    }

    public function attemptLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => '⚠️ Username wajib diisi.',
            'password.required' => '⚠️ Password wajib diisi.',
        ]);

        // Ambil user berdasarkan username
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error_message', '⚠️ Username tidak ditemukan.');
        }

        // Verifikasi password
        if (!password_verify($request->password, $user->password)) {
            return back()->with('error_message', '❌ Password salah.');
        }

        // ✔ Simpan cookie Remember Me (7 hari)
        if ($request->remember) {
            cookie()->queue(cookie('remember_username', $request->username, 60 * 24 * 7));
        } else {
            cookie()->queue(cookie()->forget('remember_username'));
        }

        Auth::login($user);

        // Opsional: redirect beda sesuai level
        if ($user->level === 'admin') {
            return redirect('/publikasi');
        }

        // Jika bukan admin
        return redirect('/publikasi'); 
    }

    public function showForgotPassword()
    {
        return view('login.forgot');
    }

    public function processForgotPassword(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan.');
        }

        // Update password baru
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Password berhasil diganti! Silakan login.');
    }
}
