@extends('layouts.app')

@section('content')

<div class="h-full p-6"
     style="background: linear-gradient(135deg, #4f74c2 0%, #8fb5ff 40%, #f7e9d7 100%);">

    <div class="bg-white shadow-xl rounded-lg p-6 max-w-6xl mx-auto h-full flex flex-col">

        {{-- HEADER --}}
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-semibold">Data Publikasi</h2>
            <a href="{{ route('publikasi.addpublikasi') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
               + Tambah Publikasi
            </a>
        </div>

        {{-- TABEL --}}
        <div class="overflow-x-auto 
            @if($publikasi->count() > 0) overflow-y-auto max-h-[70vh] @endif">

            <table class="w-full border-separate border-spacing-0 shadow rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Judul</th>
                        <th class="p-3 text-left">Tipe</th>
                        <th class="p-3 text-left">Deskripsi</th>
                        <th class="p-3 text-left">File / Link</th>
                        <th class="p-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white">

                    {{-- Jika kosong --}}
                    @if ($publikasi->count() == 0)
                    <tr>
                        <td colspan="6" class="p-5 text-center text-gray-600">
                            Belum ada publikasi.
                        </td>
                    </tr>
                    @endif

                    {{-- Isi data --}}
                    @foreach ($publikasi as $p)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $p->judul }}</td>
                        <td class="p-3">{{ $p->tipe_file }}</td>
                        <td class="p-3">{{ Str::limit($p->deskripsi, 50) }}</td>
                        <td class="p-3">
                            @if ($p->tipe_file == 'file')
                                <a href="{{ asset('storage/' . $p->file_path) }}" target="_blank"
                                   class="text-blue-600 font-semibold hover:underline">Lihat File</a>
                            @else
                                <a href="{{ $p->url }}" target="_blank"
                                   class="text-green-600 font-semibold hover:underline">Kunjungi Link</a>
                            @endif
                        </td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('publikasi.edit', $p->id) }}"
                               class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded">
                               Edit
                            </a>

                            <form action="{{ route('publikasi.destroy', $p->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus publikasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection
