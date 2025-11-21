<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PublikasiController extends Controller
{
    /**
     * Menampilkan halaman daftar publikasi (admin)
     */
    public function publikasi(Request $request)
    {
        $search = $request->search;

        $publikasi = Publikasi::when($search, function ($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(20);

        return view('publikasi.publikasi', compact('publikasi', 'search'));
    }

    /**
     * Form tambah publikasi
     */
    public function addpublikasi()
    {
        return view('publikasi.addpublikasi');
    }

    /**
     * Simpan publikasi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'tipe_file'   => 'required|string',

            'file_upload' => 'nullable|file|mimes:pdf,doc,docx,xlsx,ppt,pptx|max:20480',
            'url'         => 'nullable|url'
        ]);

        $filePath = null;

        // Upload file jika tipe = file
        if ($request->tipe_file === 'file' && $request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('publikasi', $namaFile, 'public');
        }

        Publikasi::create([
            'judul'       => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'tipe_file'   => $request->tipe_file,
            'file_path'   => $filePath,
            'url'         => $request->url,
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->route('publikasi.publikasi')->with('success', 'Publikasi berhasil ditambahkan.');
    }

    /**
     * Form edit
     */
    public function editpublikasi($id)
    {
        $publikasi = Publikasi::findOrFail($id);
        return view('publikasi.editpublikasi', compact('publikasi'));
    }

    /**
     * Update publikasi
     */
    public function update(Request $request, $id)
    {
        $publikasi = Publikasi::findOrFail($id);

        $request->validate([
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'tipe_file'   => 'required|string',

            'file_upload' => 'nullable|file|mimes:pdf,doc,docx,xlsx,ppt,pptx|max:20480',
            'url'         => 'nullable|url'
        ]);

        $filePath = $publikasi->file_path;

        // Upload file baru
        if ($request->tipe_file === 'file' && $request->hasFile('file_upload')) {

            if ($filePath && File::exists(public_path('storage/' . $filePath))) {
                File::delete(public_path('storage/' . $filePath));
            }

            $file = $request->file('file_upload');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('publikasi', $namaFile, 'public');
        }

        $publikasi->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe_file' => $request->tipe_file,
            'file_path' => $filePath,
            'url'       => $request->url,
        ]);

        return redirect()->route('publikasi.publikasi')->with('success', 'Publikasi berhasil diperbarui.');
    }

    /**
     * Hapus publikasi
     */
    public function destroy($id)
    {
        $publikasi = Publikasi::findOrFail($id);

        if ($publikasi->file_path && File::exists(public_path('storage/' . $publikasi->file_path))) {
            File::delete(public_path('storage/' . $publikasi->file_path));
        }

        $publikasi->delete();

        return redirect()->route('publikasi.publikasi')->with('success', 'Publikasi berhasil dihapus.');
    }

        public function detailpublikasi($id)
    {
        $data = Publikasi::findOrFail($id);
        return view('publikasi.detailpublikasi', compact('data'));
    }

}
