@extends('layouts.admin.app')

@section('title', 'Data Media')

@section('content')

<div class="px-6 py-6">

    {{-- TOP TITLE + BREADCRUMB --}}
    <div>
        <nav class="text-sm text-white/80 mb-1">
            Pages / <span class="font-semibold text-white">Media</span>
        </nav>
        <h1 class="text-2xl font-bold text-white">Data Media</h1>
    </div>

    {{-- CARD UTAMA --}}
    <div class="bg-white shadow-xl rounded-2xl p-6 mt-8">

        {{-- FILTER & SEARCH --}}
        <form method="GET" class="flex gap-3 mb-6">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="border px-3 py-2 rounded"
                   placeholder="Cari caption / file">

            <select name="ref_table" class="border px-3 py-2 rounded">
                <option value="">Tabel Referensi</option>
                <option value="warga" {{ request('ref_table')=='warga'?'selected':'' }}>Warga</option>
                <option value="keluarga_kk" {{ request('ref_table')=='keluarga_kk'?'selected':'' }}>Keluarga KK</option>
                <option value="peristiwa_kelahiran" {{ request('ref_table')=='peristiwa_kelahiran'?'selected':'' }}>Kelahiran</option>
                <option value="peristiwa_kematian" {{ request('ref_table')=='peristiwa_kematian'?'selected':'' }}>Kematian</option>
                <option value="peristiwa_pindah" {{ request('ref_table')=='peristiwa_pindah'?'selected':'' }}>Pindah</option>
            </select>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Filter
            </button>

            <a href="{{ route('media.index') }}" class="px-4 py-2 text-purple-600">
                Reset
            </a>

        </form>
        {{-- END FILTER --}}

        {{-- HEADER CARD --}}
       <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">List Data Media</h2>

            <a href="{{ route('media.create') }}"
            class="bg-[#6c63ff] hover:bg-[#5a54e6] text-white py-2 px-4 rounded-xl shadow flex items-center gap-1">
                <i class="fa fa-plus"></i> Tambah Media
            </a>
        </div>


        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">

                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="p-3 border">No</th>
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Ref Table</th>
                        <th class="p-3 border">Ref ID</th>
                        <th class="p-3 border">File</th>
                        <th class="p-3 border">Caption</th>
                        <th class="p-3 border">Mime</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($media as $item)
                        <tr class="border">

                            {{-- NOMOR URUT --}}
                            <td class="p-3 border">
                                {{ ($media->currentPage() - 1) * $media->perPage() + $loop->iteration }}
                            </td>

                            <td class="p-3 border">{{ $item->media_id }}</td>
                            <td class="p-3 border">{{ $item->ref_table }}</td>
                            <td class="p-3 border">{{ $item->ref_id }}</td>

                            <td class="p-3 border">
                                <a href="{{ asset('storage/' . $item->file_url) }}"
                                   target="_blank"
                                   class="text-blue-600 underline">
                                    {{ basename($item->file_url) }}
                                </a>
                            </td>

                            <td class="p-3 border">{{ $item->caption ?? '-' }}</td>
                            <td class="p-3 border">{{ $item->mime_type ?? '-' }}</td>

                          <td class="p-3 border">
                            <div class="flex gap-2">

                                {{-- LIHAT --}}
                                <a href="{{ route('media.show', $item->media_id) }}"
                                class="flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                    <i class="fa fa-eye"></i>
                                    <span>Lihat</span>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('media.edit', $item->media_id) }}"
                                class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    <i class="fa fa-edit"></i>
                                    <span>Edit</span>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('media.destroy', $item->media_id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus media ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        <i class="fa fa-trash"></i>
                                        <span>Hapus</span>
                                    </button>
                                </form>

                            </div>
                        </td>


                    @empty
                        <tr>
                            <td colspan="8" class="text-center p-4 text-gray-500">
                                Belum ada data media
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-4">
            {{ $media->withQueryString()->links() }}
        </div>

    </div>

</div>

@endsection
