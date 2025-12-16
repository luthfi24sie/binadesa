@extends('layouts.admin.app')

@section('title', 'Tambah Media')

@section('content')

<div class="px-6 py-6">

    {{-- TITLE & BREADCRUMB --}}
    <div>
        <nav class="text-sm text-white/80 mb-1">
            Pages / Media / <span class="font-semibold text-white">Tambah</span>
        </nav>
        <h1 class="text-2xl font-bold text-white">Tambah Media</h1>
    </div>

    {{-- CARD --}}
    <div class="bg-white shadow-xl rounded-2xl p-6 mt-8 max-w-3xl">

        <form action="{{ route('media.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- REF TABLE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Referensi Tabel</label>
                <input type="text"
                       name="ref_table"
                       class="border rounded w-full px-3 py-2"
                       placeholder="contoh: warga / peristiwa_kelahiran"
                       required>
            </div>

            {{-- REF ID --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">ID Referensi</label>
                <input type="number"
                       name="ref_id"
                       class="border rounded w-full px-3 py-2"
                       placeholder="ID data terkait"
                       required>
            </div>

            {{-- FILE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">File</label>
                <input type="file"
                       name="file"
                       class="border rounded w-full px-3 py-2"
                       required>
                <small class="text-gray-500">
                    Maksimal 5MB (jpg, png, pdf, dll)
                </small>
            </div>

            {{-- CAPTION --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Caption</label>
                <input type="text"
                       name="caption"
                       class="border rounded w-full px-3 py-2"
                       placeholder="Keterangan file (opsional)">
            </div>

            {{-- SORT ORDER --}}
            <div class="mb-6">
                <label class="block mb-1 font-semibold">Urutan</label>
                <input type="number"
                       name="sort_order"
                       class="border rounded w-full px-3 py-2"
                       value="0">
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded flex items-center gap-1">
                    <i class="fa fa-save"></i> Simpan
                </button>

                <a href="{{ route('media.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded flex items-center gap-1">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
