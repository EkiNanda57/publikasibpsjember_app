@extends('layouts.admin')

@section('title', 'Detail Publikasi')

@section('content')

<div class="min-h-screen p-4 sm:p-6"
     style="background: linear-gradient(135deg, #4f74c2 0%, #8fb5ff 40%, #f7e9d7 100%);">

    <div class="bg-white shadow-xl rounded-lg p-6 w-full max-w-3xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-4 text-center sm:text-left">
            <h2 class="text-xl sm:text-2xl font-semibold text-blue-700">
                Detail Publikasi
            </h2>
        </div>

        <hr class="my-4">

        {{-- JUDUL --}}
        <div class="mb-4">
            <h3 class="text-base sm:text-lg font-semibold text-gray-700">Judul Publikasi</h3>
            <p class="text-gray-600 break-words">{{ $data->judul }}</p>
        </div>

        {{-- DESKRIPSI --}}
        <div class="mb-4">
            <h3 class="text-base sm:text-lg font-semibold text-gray-700">Deskripsi</h3>
            <p class="text-gray-600 leading-relaxed break-words">
                {{ $data->deskripsi ?? '-' }}
            </p>
        </div>

        {{-- FILE / LINK --}}
        <div class="mb-4">
            <h3 class="text-base sm:text-lg font-semibold text-gray-700">File / Link Publikasi</h3>

            @if ($data->tipe_file == 'file')
                @if ($data->file_path)
                    <a href="{{ asset('storage/' . $data->file_path) }}" target="_blank"
                       class="block w-full mt-3 text-center py-3 rounded-xl border border-blue-600 text-blue-600 
                              hover:bg-blue-600 hover:text-white transition break-words">
                        📄 Lihat / Unduh File
                    </a>
                @else
                    <p class="text-red-500 mt-2">File tidak tersedia.</p>
                @endif

            @elseif ($data->tipe_file == 'link')
                <a href="{{ $data->url }}" target="_blank"
                   class="block w-full mt-3 text-center py-3 rounded-xl border border-green-600 text-green-600 
                          hover:bg-green-600 hover:text-white transition break-words">
                    🔗 Kunjungi Link Publikasi
                </a>
            @endif
        </div>

        <hr class="my-4">

        {{-- BUTTON KEMBALI --}}
        <a href="{{ route('publikasi.publikasi') }}"
           class="block w-full text-center py-3 rounded-xl bg-gray-300 hover:bg-gray-400
                  text-gray-700 transition">
            Kembali
        </a>

    </div>

</div>

@endsection
