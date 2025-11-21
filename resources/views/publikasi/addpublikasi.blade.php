@extends('layouts.app')

@section('content')

<div class="h-full p-6"
     style="background: linear-gradient(135deg, #4f74c2 0%, #8fb5ff 40%, #f7e9d7 100%);">

    <div class="bg-white shadow-xl rounded-lg p-6 max-w-4xl mx-auto">

        {{-- HEADER --}}
        <div class="flex justify-between mb-6">
            <h2 class="text-xl font-semibold">Tambah Publikasi</h2>

            <a href="{{ route('publikasi.publikasi') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>

        {{-- FORM --}}
        <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul Publikasi</label>
                <input type="text" name="judul" required
                       class="w-full border rounded px-3 py-2"
                       placeholder="Masukkan judul publikasi">
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="w-full border rounded px-3 py-2"
                          placeholder="Masukkan deskripsi (opsional)"></textarea>
            </div>

            {{-- Tipe File --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Tipe Publikasi</label>

                <select name="tipe_file" id="tipe_file"
                        class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih tipe --</option>
                    <option value="file">File</option>
                    <option value="link">Link URL</option>
                </select>
            </div>

            {{-- INPUT FILE --}}
            <div id="file_input" class="mb-4 hidden">
                <label class="block font-semibold mb-1">Upload File (PDF/DOC/PPT/XLX)</label>
                <input type="file" name="file_upload"
                       class="w-full border rounded px-3 py-2">
            </div>

            {{-- INPUT LINK --}}
            <div id="url_input" class="mb-4 hidden">
                <label class="block font-semibold mb-1">URL</label>
                <input type="url" name="url"
                       class="w-full border rounded px-3 py-2"
                       placeholder="https://contoh.com">
            </div>

            {{-- Button --}}
            <div class="mt-6">
                <button class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                    Simpan Publikasi
                </button>
            </div>

        </form>

    </div>

</div>

<script>
    const tipeFile = document.getElementById('tipe_file');
    const fileInput = document.getElementById('file_input');
    const urlInput = document.getElementById('url_input');

    tipeFile.addEventListener('change', function () {
        if (this.value === 'file') {
            fileInput.classList.remove('hidden');
            urlInput.classList.add('hidden');
        } else if (this.value === 'link') {
            urlInput.classList.remove('hidden');
            fileInput.classList.add('hidden');
        } else {
            fileInput.classList.add('hidden');
            urlInput.classList.add('hidden');
        }
    });
</script>

@endsection
