<?php

use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\KeluargaKKGuestController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\PeristiwaKematianController;
use App\Http\Controllers\PeristiwaPindahController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;
// Duplicate import removed

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ketua', function () {
    return view('ketua');
});
Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Resource routes
Route::resource('anggota-keluarga', AnggotaKeluargaController::class);
Route::resource('warga', WargaController::class);
Route::resource('keluarga_kk', KeluargaKKController::class);
Route::resource('anggota_keluarga', AnggotaKeluargaController::class);


// === PERISTIWA KEPENDUDUKAN ===
// Ubah agar nama route sesuai sidebar
Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
Route::resource('peristiwa_kematian', PeristiwaKematianController::class);
Route::resource('peristiwa_pindah', PeristiwaPindahController::class);

// === MEDIA ===
Route::resource('media', MediaController::class);

