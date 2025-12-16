@extends('layouts.admin.app')

@section('title', 'Edit Anggota')

@section('content')

<div class="px-6 py-6">

    <h1 class="text-2xl font-bold text-white mb-6">Edit Anggota Keluarga</h1>

    <div class="bg-white shadow-xl rounded-2xl p-6">

<<<<<<< HEAD
        <form action="{{ route('anggota-keluarga.update', $anggota) }}" method="POST">
=======
        <form action="{{ route('anggota_keluarga.update', $anggota) }}" method="POST">
>>>>>>> 868c5c2281305549b0c0e6533856867fd3e5cc09
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label>Kartu Keluarga (KK)</label>
                    <select name="kk_id" class="w-full border p-2 rounded outline-blue-500">
                        @foreach ($keluarga as $item)
                            <option value="{{ $item->kk_id }}" 
                                {{ $anggota->kk_id == $item->kk_id ? 'selected' : '' }}>
                                {{ $item->kk_nomor }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Warga</label>
                    <select name="warga_id" class="w-full border p-2 rounded outline-blue-500">
                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}"
                                {{ $anggota->warga_id == $w->warga_id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-2">
                    <label>Hubungan</label>
                    <input type="text" name="hubungan" value="{{ $anggota->hubungan }}"
                           class="w-full border p-2 rounded outline-blue-500" required>
                </div>

            </div>

            <button class="mt-6 bg-yellow-500 text-white py-2 px-4 rounded-xl">
                Update
            </button>

        </form>

    </div>

</div>

@endsection
