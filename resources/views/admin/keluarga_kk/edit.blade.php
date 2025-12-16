@extends('layouts.admin.app')
@section('title','Edit Keluarga')
@section('content')
<div class="px-6 py-6">
    <div class="text-white mb-6">
        <nav class="text-sm opacity-70">Pages / <span class="font-semibold">Keluarga</span></nav>
        <h1 class="text-2xl font-bold">Edit Keluarga</h1>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <form action="{{ route('keluarga_kk.update', $keluarga) }}" method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Nomor KK</label>
                    <input name="kk_nomor" value="{{ old('kk_nomor', $keluarga->kk_nomor) }}" class="w-full border rounded px-3 py-2" required>
                    @error('kk_nomor')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label>Kepala Keluarga</label>
                    <select name="kepala_keluarga_warga_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        @foreach($warga as $w) 
                            <option value="{{ $w->warga_id }}" {{ $keluarga->kepala_keluarga_warga_id == $w->warga_id ? 'selected':'' }}>
                                {{ $w->nama }} ({{ $w->no_ktp }})
                            </option> 
                        @endforeach
                    </select>
                    @error('kepala_keluarga_warga_id')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label>Alamat</label>
                    <textarea name="alamat" class="w-full border rounded px-3 py-2">{{ old('alamat', $keluarga->alamat) }}</textarea>
                </div>
                <div>
                    <label>RT</label>
                    <input name="rt" value="{{ old('rt', $keluarga->rt) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label>RW</label>
                    <input name="rw" value="{{ old('rw', $keluarga->rw) }}" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <div class="mt-4 flex gap-3">
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('keluarga_kk.index') }}" class="bg-gray-200 px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection