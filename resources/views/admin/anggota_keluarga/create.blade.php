@extends('layouts.admin.app')

@section('title', 'Tambah Anggota Keluarga')

@section('content')

<div class="px-6 py-6">

    {{-- PAGE TITLE --}}
    <h1 class="text-2xl font-bold text-white mb-6">
        Tambah Anggota Keluarga
    </h1>

    <div class="bg-white shadow-xl rounded-2xl p-6">

        <form action="{{ route('anggota.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- KARTU KELUARGA --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Kartu Keluarga (KK)
                    </label>
                    <select name="kk_id"
                            class="w-full border p-2 rounded outline-blue-500">
                        @foreach ($kk as $item)
                            <option value="{{ $item->kk_id }}">
                                {{ $item->kk_nomor }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- WARGA --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Warga
                    </label>
                    <select name="warga_id"
                            class="w-full border p-2 rounded outline-blue-500">
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}">
                                {{ $w->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- HUBUNGAN --}}
                <div class="col-span-2">
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Hubungan
                    </label>
                    <input type="text"
                           name="hubungan"
                           class="w-full border p-2 rounded outline-blue-500"
                           required>
                </div>

            </div>

            {{-- ACTION BUTTON --}}
            <div class="mt-6 flex gap-3">

                {{-- SIMPAN --}}
                <button type="submit"
                        class="bg-[#6c63ff] hover:bg-[#5a54e6]
                               text-white py-2 px-5 rounded-xl shadow">
                    Simpan
                </button>

                {{-- BATAL --}}
                <a href="{{ route('anggota_keluarga.index') }}"
                   class="bg-gray-200 hover:bg-gray-300
                          text-gray-700 py-2 px-5 rounded-xl">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
