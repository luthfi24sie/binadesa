@extends('layouts.admin.app')

@section('title', 'Detail Media')

@section('content')

<div class="px-6 py-6">

    {{-- TITLE --}}
    <div>
        <nav class="text-sm text-white/80 mb-1">
            Pages / Media / <span class="font-semibold text-white">Detail</span>
        </nav>
        <h1 class="text-2xl font-bold text-white">Detail Media</h1>
    </div>

    {{-- CARD --}}
    <div class="bg-white shadow-xl rounded-2xl p-6 mt-8 max-w-3xl">

        <table class="w-full text-sm">
            <tr>
                <td class="font-semibold py-2 w-48">ID Media</td>
                <td>{{ $media->media_id }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-2">Referensi Tabel</td>
                <td>{{ $media->ref_table }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-2">ID Referensi</td>
                <td>{{ $media->ref_id }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-2">Caption</td>
                <td>{{ $media->caption ?? '-' }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-2">Tipe File</td>
                <td>{{ $media->mime_type }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-2">File</td>
                <td>
                    <a href="{{ asset('storage/' . $media->file_url) }}"
                       target="_blank"
                       class="text-blue-600 underline">
                        {{ basename($media->file_url) }}
                    </a>
                </td>
            </tr>
        </table>

        {{-- BUTTON --}}
        <div class="flex gap-3 mt-6">
            <a href="{{ route('media.edit', $media->media_id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded flex items-center gap-1">
                <i class="fa fa-edit"></i> Edit
            </a>

            <a href="{{ route('media.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded flex items-center gap-1">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>

</div>

@endsection
