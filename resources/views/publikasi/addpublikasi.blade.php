@extends('layouts.app')

@section('content')

<div class="h-full p-6"
     style="background: linear-gradient(120deg, #9ad0ec, #f7d59c, #b0f28a);">

    <div class="bg-white shadow-xl rounded-lg p-6 max-w-4xl mx-auto">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Tambah Publikasi</h2>
            <a href="{{ route('publikasi.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
               Kembali
            </a>
        </div>

        {{-- FORM --}}
        <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- JUDUL --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Judul Publikasi</label>
                <input type="text" name="judul"
                       class="w-full border rounded p-2"
                       placeholder="Masukkan judul publikasi" required>
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Deskripsi</label>
                <textarea name="deskripsi"
                          class="w-full border rounded p-2"
                          rows="3"
                          placeholder="Masukkan deskripsi (opsional)"></textarea>
            </div>

            {{-- TIPE FILE --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Tipe Publikasi</label>
                <select name="tipe_file" id="tipe_file"
                        class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="file">File</option>
                    <option value="link">Link</option>
                </select>
            </div>

            {{-- INPUT FILE (hidden default) --}}
            <div class="mb-4 hidden" id="input_file">
                <label class="block font-medium mb-1">Upload File</label>
                <input type="file" name="file_path"
                       class="w-full border rounded p-2">
                <p class="text-sm text-gray-600 mt-1">Format: PDF, doc, gambar, dll.</p>
            </div>

            {{-- INPUT LINK (hidden default) --}}
            <div class="mb-4 hidden" id="input_url">
                <label class="block font-medium mb-1">Masukkan URL</label>
                <input type="text" name="url"
                       class="w-full border rounded p-2"
                       placeholder="https://contoh.com/artikel">
            </div>

            {{-- BUTTON --}}
            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                    Simpan Publikasi
                </button>
            </div>

        </form>

    </div>
</div>

{{-- SCRIPT SHOW/HIDE --}}
<script>
    document.getElementById('tipe_file').addEventListener('change', function () {
        let fileInput = document.getElementById('input_file');
        let urlInput  = document.getElementById('input_url');

        fileInput.classList.add('hidden');
        urlInput.classList.add('hidden');

        if (this.value === 'file') {
            fileInput.classList.remove('hidden');
        } else if (this.value === 'link') {
            urlInput.classList.remove('hidden');
        }
    });
</script>

@endsection
