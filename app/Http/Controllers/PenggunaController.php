<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasi;

class PenggunaController extends Controller
{
    // Halaman utama pengguna, menampilkan semua publikasi
    public function index(Request $request)
    {
        $search = $request->search;

        // Ambil data publikasi, filter jika ada search
        $publikasi = Publikasi::when($search, function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim data ke view pengguna/halamanpengguna.blade.php
        return view('pengguna.halamanpengguna', compact('publikasi'));
    }

    // Halaman detail publikasi untuk pengguna
   public function detailpublikasi($id)
{
    $data = Publikasi::findOrFail($id);
    return view('pengguna.detail-pengguna', compact('data'));
}


}
