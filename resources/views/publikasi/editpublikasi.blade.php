@extends('layouts.admin')

@section('title', 'Edit Publikasi')

@section('content')

<div class="h-full p-6"
     style="background: linear-gradient(135deg, #4f74c2 0%, #8fb5ff 40%, #f7e9d7 100%);">

    <div class="bg-white shadow-xl rounded-lg p-6 max-w-4xl mx-auto">

        {{-- HEADER --}}
        <div class="flex justify-between mb-6">
            <h2 class="text-xl font-semibold">Edit Publikasi</h2>

            <a href="{{ route('publikasi.publikasi') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>

        {{-- FORM --}}
        <form action="{{ route('publikasi.update', $publikasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul Publikasi</label>
                <input type="text" name="judul" required
                       value="{{ $publikasi->judul }}"
                       class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300 outline-none">{{ $publikasi->deskripsi }}</textarea>
            </div>

            {{-- Tipe File --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Tipe Publikasi</label>
                <select name="tipe_file" id="tipe_file"
                        class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300 outline-none" required>
                    <option value="">-- Pilih tipe --</option>
                    <option value="file" {{ $publikasi->tipe_file == 'file' ? 'selected' : '' }}>File</option>
                    <option value="link" {{ $publikasi->tipe_file == 'link' ? 'selected' : '' }}>Link URL</option>
                </select>
            </div>

            {{-- INPUT FILE --}}
            <div id="file_input"
                 class="mb-4 {{ $publikasi->tipe_file == 'file' ? '' : 'hidden' }}">

                <label class="block font-semibold mb-1">Upload File Baru (opsional)</label>

                @if($publikasi->file_path)
                    <p class="mb-2">
                        File saat ini:
                        <a href="{{ asset('storage/'.$publikasi->file_path) }}" target="_blank"
                           class="text-blue-600 font-semibold underline">
                           Lihat File Lama
                        </a>
                    </p>
                @endif

                <input type="file" name="file_upload"
                       class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
            </div>

            {{-- INPUT LINK --}}
            <div id="link_input"
                 class="mb-4 {{ $publikasi->tipe_file == 'link' ? '' : 'hidden' }}">

                <label class="block font-semibold mb-1">Link URL</label>
                <input type="text" name="url"
                       value="{{ $publikasi->url }}"
                       class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

{{-- Script untuk menampilkan input sesuai pilihan --}}
<script>
    const tipeSelect = document.getElementById('tipe_file');
    const fileInput  = document.getElementById('file_input');
    const linkInput  = document.getElementById('link_input');

    tipeSelect.addEventListener('change', function () {
        if (this.value === 'file') {
            fileInput.classList.remove('hidden');
            linkInput.classList.add('hidden');
        } else if (this.value === 'link') {
            fileInput.classList.add('hidden');
            linkInput.classList.remove('hidden');
        }
    });
</script>

@endsection
