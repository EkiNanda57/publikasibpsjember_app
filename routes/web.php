<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublikasiController;

// LOGIN
Route::get('/', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'attemptLogin'])->name('login.attempt');
// halaman publik (tanpa login)
Route::get('/publikasi', [PublikasiController::class, 'index']);

// REGISTER
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// LUPA PASSWORD
Route::get('/forgot-password', [LoginController::class, 'showForgotPassword'])->name('password.forgot');
Route::post('/forgot-password', [LoginController::class, 'processForgotPassword'])->name('password.forgot.process');

// PUBLIKASI
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/publikasi', [PublikasiController::class, 'publikasi'])->name('publikasi.publikasi');
    Route::get('/publikasi/create', [PublikasiController::class, 'create'])->name('publikasi.create');
    Route::post('/publikasi/store', [PublikasiController::class, 'store'])->name('publikasi.store');
    Route::get('/publikasi/{id}/edit', [PublikasiController::class, 'edit'])->name('publikasi.edit');
    Route::post('/publikasi/{id}/update', [PublikasiController::class, 'update'])->name('publikasi.update');
    Route::delete('/publikasi/{id}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy');
});

// LOGOUT
Route::get('/logout', function () {
    session()->forget('user_id'); // hapus session
    return redirect('/')->with('success', 'Anda berhasil logout.');
})->name('logout');

