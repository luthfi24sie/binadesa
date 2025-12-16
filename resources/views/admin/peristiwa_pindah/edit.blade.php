@extends('layouts.admin.app')

@section('title', 'Edit Data Pindah')

@section('content')
<div class="px-6 py-6">

    <h1 class="text-2xl font-bold text-white mb-6">Edit Data Perpindahan</h1>

    <div class="bg-white rounded-2xl shadow-xl p-6">

        <form action="{{ route('pindah.update', $pindah) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label>Nama Warga</label>
                    <select name="warga_id" class="w-full border p-2 rounded">
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}"
                                {{ $data->warga_id == $w->warga_id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Tanggal Pindah</label>
                    <input type="date"
                           name="tgl_pindah"
                           value="{{ $data->tgl_pindah }}"
                           class="w-full border p-2 rounded">
                </div>

                <div class="col-span-2">
                    <label>Alamat Tujuan</label>
                    <textarea name="alamat_tujuan"
                              class="w-full border p-2 rounded">{{ $data->alamat_tujuan }}</textarea>
                </div>

                <div class="col-span-2">
                    <label>Alasan</label>
                    <textarea name="alasan"
                              class="w-full border p-2 rounded">{{ $data->alasan }}</textarea>
                </div>

                <div>
                    <label>No Surat</label>
                    <input type="text"
                           name="no_surat"
                           value="{{ $data->no_surat }}"
                           class="w-full border p-2 rounded">
                </div>

            </div>

            <div class="mt-6 flex gap-3">
                <button class="bg-[#6c63ff] text-white py-2 px-4 rounded-xl">
                    Update
                </button>

                <a href="{{ route('peristiwa_pindah.index') }}"
                   class="px-4 py-2 border rounded-xl">
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>
@endsection
