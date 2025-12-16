@extends('layouts.admin.app')
@section('title','Tambah User')

@section('content')
<div class="px-6 py-6">

    {{-- Header --}}
    <div class="text-white mb-6">
        <nav class="text-sm opacity-70">Pages / <span class="font-semibold">User</span></nav>
        <h1 class="text-2xl font-bold">Tambah User</h1>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Name --}}
                <div>
                    <label class="font-medium">Name</label>
                    <input name="name"
                           value="{{ old('name') }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="font-medium">Email</label>
                    <input name="email"
                           type="email"
                           value="{{ old('email') }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="font-medium">Password</label>
                    <input name="password"
                           type="password"
                           class="w-full border rounded px-3 py-2"
                           required>
                    @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Password Confirmation --}}
                <div>
                    <label class="font-medium">Password Confirmation</label>
                    <input name="password_confirmation"
                           type="password"
                           class="w-full border rounded px-3 py-2"
                           required>
                    @error('password_confirmation') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label class="font-medium">Role</label>
                    <select name="role" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        <option value="Admin">Admin</option>
                        <option value="Warga">Warga</option>
                        <option value="Mitra">Mitra</option>
                    </select>
                    @error('role') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Profile Picture --}}
                <div>
                    <label class="font-medium">Profile Picture</label>
                    <input name="profile_picture"
                           type="file"
                           class="w-full border rounded px-3 py-2">
                    @error('profile_picture') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

            </div>

            <div class="mt-6 flex gap-3">
                <button class="bg-[#6c63ff] text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('user.index') }}" class="bg-gray-200 px-4 py-2 rounded">Batal</a>
            </div>

        </form>
    </div>
</div>
@endsection
