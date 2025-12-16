@extends('layouts.admin.app')
@section('title','Data User')

@section('content')
<div class="px-6 py-6">

    {{-- BREADCRUMB --}}
    <nav class="text-sm text-white/80 mb-1">
        Pages / <span class="font-semibold text-white">User</span>
    </nav>

    <h1 class="text-2xl font-bold text-white">Data User</h1>

    {{-- FLASH SUCCESS --}}
    @if(session('success'))
    <div class="mt-4 p-3 rounded bg-green-100 text-green-700">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white p-6 rounded-2xl shadow mt-6">

        {{-- BUTTON TAMBAH --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">List User</h2>

            <a href="{{ route('user.create') }}"
               class="bg-[#6c63ff] text-white px-4 py-2 rounded">
                + Tambah User
            </a>
        </div>

        {{-- TABEL USER --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 border">No</th>
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Email</th>
                        <th class="p-3 border">Role</th>
                        <th class="p-3 border">Foto Profil</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($dataUser as $item)
                    <tr class="border">
                        <td class="p-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-3">{{ $item->name }}</td>

                        <td class="p-3">{{ $item->email }}</td>

                        {{-- ROLE --}}
                        <td class="p-3 uppercase">
                            <span class="px-2 py-1 rounded bg-gray-200 text-gray-700 text-xs font-semibold">
                                {{ $item->role ?? '-' }}
                            </span>
                        </td>

                        {{-- FOTO PROFIL --}}
                        <td class="p-3">
                            @if($item->profile_picture)
                                <img src="{{ asset('storage/' . $item->profile_picture) }}"
                                     width="45" height="45"
                                     class="rounded-full object-cover">
                            @else
                                <span>-</span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('user.edit', $item->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded">
                                Edit
                            </a>

                            <form action="{{ route('user.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 text-white rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center">Belum ada user</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
