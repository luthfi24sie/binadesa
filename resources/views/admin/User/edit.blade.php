@extends('layouts.admin.app')
@section('title','Edit User')

@section('content')
<div class="px-6 py-6">

    {{-- Header --}}
    <div class="text-white mb-6">
        <nav class="text-sm opacity-70">
            Pages / User / <span class="font-semibold">Edit User</span>
        </nav>
        <h1 class="text-2xl font-bold">Edit User</h1>
        <p class="opacity-70">Perbarui data user sesuai kebutuhan.</p>
    </div>

    {{-- FORM --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <form action="{{ route('user.update', $dataUser->id) }}" 
              method="POST" 
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Name --}}
                <div>
                    <label class="font-medium">Nama</label>
                    <input type="text"
                           name="name"
                           value="{{ $dataUser->name }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="font-medium">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ $dataUser->email }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label class="font-medium">Role</label>
                    <select name="role" class="w-full border rounded px-3 py-2">
                        <option value="Admin" {{ $dataUser->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Pelanggan" {{ $dataUser->role == 'Warga' ? 'selected' : '' }}>Warga</option>
                        <option value="Mitra" {{ $dataUser->role == 'Mitra' ? 'selected' : '' }}>Mitra</option>
                    </select>
                    @error('role') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="font-medium">
                        Password <span class="text-gray-500 text-sm">(kosongkan bila tidak diganti)</span>
                    </label>
                    <input type="password"
                           name="password"
                           class="w-full border rounded px-3 py-2">
                    @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Profile Picture --}}
                <div>
                    <label class="font-medium">Profile Picture</label>
                    <input type="file"
                           name="profile_picture"
                           class="w-full border rounded px-3 py-2">
                    @error('profile_picture') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Current Photo Preview --}}
                @if ($dataUser->profile_picture)
                <div>
                    <label class="font-medium">Foto Saat Ini</label>
                    <div class="mt-1">
                        <img src="{{ asset('storage/' . $dataUser->profile_picture) }}"
                             class="w-32 rounded-lg shadow border">
                    </div>
                </div>
                @endif

            </div>

            {{-- Buttons --}}
            <div class="mt-6 flex gap-3">
                <button class="bg-[#6c63ff] text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('user.index') }}" class="bg-gray-200 px-4 py-2 rounded">Batal</a>
            </div>

        </form>
    </div>

</div>
@endsection
