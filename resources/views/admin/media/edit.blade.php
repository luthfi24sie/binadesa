@extends('layouts.admin.app')

@section('title', 'Edit Media')

@section('content')

<div class="px-6 py-6">

    {{-- TITLE & BREADCRUMB --}}
    <div>
        <nav class="text-sm text-white/80 mb-1">
            Pages / Media / <span class="font-semibold text-white">Edit</span>
        </nav>
        <h1 class="text-2xl font-bold text-white">Edit Media</h1>
    </div>

    {{-- CARD --}}
    <div class="bg-white shadow-xl rounded-2xl p-6 mt-8 max-w-3xl">

        <form action="{{ route('media.update', $media->media_id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- REF TABLE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Referensi Tabel</label>
                <input type="text"
                       name="ref_table"
                       class="border rounded w-full px-3 py-2"
                       value="{{ $media->ref_table }}"
                       required>
            </div>

            {{-- REF ID --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">ID Referensi</label>
                <input type="number"
                       name="ref_id"
                       class="border rounded w-full px-3 py-2"
                       value="{{ $media->ref_id }}"
                       required>
            </div>

            {{-- FILE LAMA --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">File Saat Ini</label>
                <a href="{{ asset('storage/' . $media->file_url) }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    {{ basename($media->file_url) }}
                </a>
            </div>

            {{-- GANTI FILE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Ganti File (Opsional)</label>
                <input type="file"
                       name="file"
                       class="border rounded w-full px-3 py-2">
            </div>

            {{-- CAPTION --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Caption</label>
                <input type="text"
                       name="caption"
                       class="border rounded w-full px-3 py-2"
                       value="{{ $media->caption }}">
            </div>

            {{-- SORT ORDER --}}
            <div class="mb-6">
                <label class="block mb-1 font-semibold">Urutan</label>
                <input type="number"
                       name="sort_order"
                       class="border rounded w-full px-3 py-2"
                       value="{{ $media->sort_order }}">
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded flex items-center gap-1">
                    <i class="fa fa-save"></i> Update
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
