@extends('layouts.admin.app')

@section('title', 'Data Perpindahan')

@section('content')

<div class="px-6 py-6">

    {{-- TITLE --}}
    <div>
        <nav class="text-sm text-white/80">
            Pages / <span class="text-white font-semibold">Peristiwa Pindah</span>
        </nav>
        <h1 class="text-2xl font-bold text-white">Data Perpindahan</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-6 mt-8">

        {{-- FILTER --}}
        <form method="GET" class="flex flex-wrap gap-3 mb-6">

            {{-- NAMA WARGA --}}
            <input type="text"
                   name="nama"
                   value="{{ request('nama') }}"
                   class="border px-3 py-2 rounded w-60"
                   placeholder="Cari nama warga">

            {{-- NO SURAT --}}
            <input type="text"
                   name="no_surat"
                   value="{{ request('no_surat') }}"
                   class="border px-3 py-2 rounded w-60"
                   placeholder="Cari no surat">

            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                Filter
            </button>

            <a href="{{ route('peristiwa_pindah.index') }}"
               class="px-4 py-2 text-purple-600">
                Reset
            </a>

        </form>

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">List Data Pindah</h2>
            <a href="{{ route('peristiwa_pindah.create') }}"
               class="bg-[#6c63ff] hover:bg-[#5a54e6] text-white px-4 py-2 rounded-xl shadow">
                <i class="fa fa-plus mr-1"></i> Tambah Data Pindah
            </a>
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Nama Warga</th>
                        <th class="p-3 border">Tanggal Pindah</th>
                        <th class="p-3 border">Alamat Tujuan</th>
                        <th class="p-3 border">Alasan</th>
                        <th class="p-3 border">No Surat</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pindah as $item)
                        <tr class="border">
                            <td class="p-3 border">{{ $item->pindah_id }}</td>
                            <td class="p-3 border">{{ optional($item->warga)->nama ?? '-' }}</td>
                            <td class="p-3 border">{{ $item->tgl_pindah }}</td>
                            <td class="p-3 border">{{ $item->alamat_tujuan }}</td>
                            <td class="p-3 border">{{ $item->alasan }}</td>
                            <td class="p-3 border">{{ $item->no_surat }}</td>

                            <td class="p-3 border">
                                <div class="flex gap-1">
                                    <a href="{{ route('peristiwa_pindah.show', $item) }}"
                                       class="bg-blue-500 text-white px-3 py-1 rounded">
                                        <i class="fa fa-eye"></i> Lihat
                                    </a>

                                    <a href="{{ route('peristiwa_pindah.edit', $item) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <form method="POST"
                                          action="{{ route('peristiwa_pindah.destroy', $item) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-3 py-1 rounded">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">
                                Tidak ada data.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-4">
            {{ $pindah->links() }}
        </div>

    </div>

</div>

@endsection
