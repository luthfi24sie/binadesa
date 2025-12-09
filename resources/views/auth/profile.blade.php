@extends('layouts.guest')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="bg-white rounded-2xl shadow p-6 max-w-2xl">
  <div class="flex items-center gap-4">
    <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('assets-admin-volt/img/team-3.jpg') }}" class="w-16 h-16 rounded-full object-cover" alt="avatar">
    <div>
      <div class="text-lg font-semibold">{{ $user->name }}</div>
      <div class="text-sm text-slate-500">{{ $user->email }} • <span class="capitalize">{{ $user->role }}</span></div>
    </div>
  </div>
  <div class="mt-4 text-sm text-slate-600">Ini adalah halaman profil sederhana.</div>
</div>
@endsection

