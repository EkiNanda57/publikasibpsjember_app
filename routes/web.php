<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN)
|--------------------------------------------------------------------------
*/

// Halaman login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'attemptLogin'])->name('login.attempt');

// Redirect root "/" 
Route::get('/', function () {
    if (Auth::check()) { 
        return redirect('/admin/publikasi'); 
    }
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/publikasi', [PublikasiController::class, 'publikasi']);
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.halamanpengguna');
Route::get('/pengguna/detail/{id}', [PenggunaController::class, 'detailpublikasi'])
     ->name('publikasi.detail-pengguna');


/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


/*
|--------------------------------------------------------------------------
| LUPA PASSWORD
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [LoginController::class, 'showForgotPassword'])->name('password.forgot');
Route::post('/forgot-password', [LoginController::class, 'processForgotPassword'])->name('password.forgot.process');


/*
|--------------------------------------------------------------------------
| ADMIN (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/publikasi', [PublikasiController::class, 'publikasi'])->name('publikasi.publikasi');
    Route::get('/publikasi/create', [PublikasiController::class, 'addpublikasi'])->name('publikasi.addpublikasi');
    Route::post('/publikasi/store', [PublikasiController::class, 'store'])->name('publikasi.store');
    Route::get('/publikasi/{id}/edit', [PublikasiController::class, 'editpublikasi'])->name('publikasi.editpublikasi');
    Route::post('/publikasi/{id}/update', [PublikasiController::class, 'update'])->name('publikasi.update');
    Route::delete('/publikasi/{id}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy');
    Route::get('/publikasi/detail/{id}', [PublikasiController::class, 'detailpublikasi'])->name('publikasi.detailpublikasi');

});


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Anda berhasil logout.');
})->name('logout');
