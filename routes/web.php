<?php

use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\KeluargaKKGuestController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\WargaController;
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
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('peristiwa_kelahiran', \App\Http\Controllers\PeristiwaKelahiranController::class);
Route::resource('peristiwa_kematian', \App\Http\Controllers\PeristiwaKematianController::class);
Route::resource('peristiwa_pindah', \App\Http\Controllers\PeristiwaPindahController::class);
Route::resource('media', \App\Http\Controllers\MediaController::class);

// Auth routes
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [\App\Http\Controllers\AuthController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.post');

// Guest routes
Route::prefix('guest')->name('guest.')->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/argon-dashboard/index.html');
    })->name('dashboard');

    Route::resource('keluarga-kk', KeluargaKKGuestController::class);
    Route::resource('users', \App\Http\Controllers\Guest\UserGuestController::class)->only(['index','edit','update','show'])->names('guest.users');
    Route::post('users/{user}/media', [\App\Http\Controllers\Guest\UserGuestController::class, 'storeMedia'])->name('guest.users.media.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return redirect('/argon-dashboard/index.html');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return redirect('/argon-dashboard/index.html');
    })->name('user.dashboard');
});
