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
        if (empty($request->email) && empty($request->password)) {
            return back()->with('error_message', '⚠️ Silahkan isi username dan password Anda.');
        }

        if (empty($request->email)) {
            return back()->with('error_message', '⚠️ Username wajib diisi.');
        }

        if (empty($request->password)) {
            return back()->with('error_message', '⚠️ Password wajib diisi.');
        }

        // Ambil user berdasarkan username
        $user = User::where('username', $request->email)->first();

        if (!$user) {
            return back()->with('error_message', '⚠️ Username tidak ditemukan.');
        }

        // Verifikasi password
        if (!password_verify($request->password, $user->password)) {
            return back()->with('error_message', '❌ Password salah.');
        }

        // ✔ Jika user pilih "Ingat Saya", simpan cookie 7 hari
        if ($request->has('remember')) {
            cookie()->queue(cookie('remember_username', $request->email, 60 * 24 * 7));
        } else {
            cookie()->queue(cookie()->forget('remember_username'));
        }

        Auth::login($user);

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
