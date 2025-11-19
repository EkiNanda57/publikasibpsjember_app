<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublikasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/publikasi', [PublikasiController::class, 'publikasi'])->name('publikasi.publikasi');
    Route::get('/publikasi/create', [PublikasiController::class, 'create'])->name('publikasi.create');
    Route::post('/publikasi/store', [PublikasiController::class, 'store'])->name('publikasi.store');
    Route::get('/publikasi/{id}/edit', [PublikasiController::class, 'edit'])->name('publikasi.edit');
    Route::post('/publikasi/{id}/update', [PublikasiController::class, 'update'])->name('publikasi.update');
    Route::delete('/publikasi/{id}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy');
});

// Halaman publik (tanpa login)
Route::get('/publikasi', [PublikasiController::class, 'index']);