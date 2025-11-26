@extends('layouts.publik')

@section('title', 'Data Publikasi')

@section('content')

<div class="h-full p-6"
     style="background: linear-gradient(135deg, #4f74c2 0%, #8fb5ff 40%, #f7e9d7 100%);">

    <div class="bg-white shadow-xl rounded-lg p-6 max-w-6xl mx-auto h-full flex flex-col">

        {{-- HEADER --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-3">

            <h2 class="text-2xl font-bold text-gray-800">Data Publikasi</h2>

            <div class="flex items-center gap-2">
                {{-- FORM SEARCH --}}
                <form action="{{ route('pengguna.halamanpengguna') }}" method="GET">
                    <input type="text"
                           name="search"
                           id="searchInput"
                           value="{{ request('search') }}"
                           placeholder="Cari judul..."
                           class="px-4 py-2 border border-gray-300 rounded-xl w-44 sm:w-56 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </form>
            </div>

        </div>

        {{-- TABEL --}}
        <div class="overflow-x-auto max-h-[70vh] overflow-y-auto">

            <table class="w-full border-separate border-spacing-0 shadow rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Judul</th>
                        <th class="p-3 text-left">Deskripsi</th>
                        <th class="p-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white">

                    {{-- Jika kosong --}}
                    @if ($publikasi->count() == 0)
                    <tr>
                        <td colspan="4" class="p-5 text-center text-gray-500 font-medium">
                            Belum ada publikasi.
                        </td>
                    </tr>
                    @endif

                    {{-- Data dari database --}}
                    @foreach ($publikasi as $p)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3 font-medium">{{ $p->judul }}</td>
                        <td class="p-3">{{ Str::limit($p->deskripsi, 50) }}</td>
                        <td class="p-3">
                            <a href="{{ route('publikasi.detail-pengguna', $p->id) }}"
                               class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
                               Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
</div>

{{-- SCRIPT SEARCH --}}
<script>
    const input = document.getElementById('searchInput');
    input.addEventListener('keyup', function () {
        input.form.submit();
    });
</script>

@endsection
