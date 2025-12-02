<?php

use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\KeluargaKKGuestController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Halaman Ketua & Anggota (Static)
Route::view('/ketua', 'ketua');
Route::view('/anggota', 'anggota');

// Dashboard utama
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource routes (Admin)
Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
Route::resource('warga', WargaController::class);
Route::resource('keluarga_kk', KeluargaKKController::class);
Route::resource('products', ProductController::class);

// Group untuk Guest
Route::prefix('guest')->name('guest.')->group(function () {

    // Dashboard Guest dialihkan ke template Argon statis
    Route::get('/dashboard', function () {
        return redirect('/argon-dashboard/index.html');
    })->name('dashboard');

    // Resource Guest untuk keluarga-kk (WAJIB biar route('guest.keluarga-kk.index') jalan)
    Route::resource('keluarga-kk', KeluargaKKGuestController::class);

    // Users (filter, pagination, search; edit dengan foto profil; detail dengan multiple upload)
    Route::resource('users', \App\Http\Controllers\Guest\UserGuestController::class)->only(['index','edit','update','show'])->names('guest.users');
    Route::post('users/{user}/media', [\App\Http\Controllers\Guest\UserGuestController::class, 'storeMedia'])->name('guest.users.media.store');
});
