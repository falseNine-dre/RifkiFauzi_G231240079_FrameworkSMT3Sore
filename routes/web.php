<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgdiController;
use App\Http\Controllers\PribadiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Route search harus di ATAS sebelum resource
Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');

// Route untuk daftar ulang
Route::get('/mahasiswa/daftar/{id_pribadi}', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');

// Simpan mahasiswa baru
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

// Route CRUD Progdi
Route::resource('progdi', ProgdiController::class);

// Route CRUD Data Pribadi Mahasiswa
Route::resource('pribadi', PribadiController::class);

// Route CRUD Mahasiswa (sudah termasuk index, create, store, edit, delete, show)
Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Route tambahan untuk search Mahasiswa
//Route::get('mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');

// Route untuk halaman daftar ulang mahasiswa baru
// Route::get('mahasiswa/daftar/{id}', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');

//Route::get('/mahasiswa/daftar/{id_pribadi}', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');

//Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
