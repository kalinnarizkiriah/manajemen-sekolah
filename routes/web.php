<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilGuruController;
use App\Http\Controllers\JadwalGuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;

// Halaman awal: arahkan sesuai kondisi login (ini yang memutus loop redirect)
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'Guru'
            ? redirect()->route('guru.table')
            : redirect()->route('siswa.table');
    }
    return redirect()->route('login');
});

// Hanya untuk yang BELUM login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// ===================== ROLE GURU =====================
Route::middleware(['auth', 'cekrole:Guru'])->group(function () {

    // Profil Guru
    Route::get('/guru', [ProfilGuruController::class, 'index'])->name('guru.table');
    Route::get('/guru/tambah', [ProfilGuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [ProfilGuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/edit/{id}', [ProfilGuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [ProfilGuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/hapus/{guru}', [ProfilGuruController::class, 'destroy'])->name('guru.destroy');

    // Jadwal Guru
    Route::get('/jadwal', [JadwalGuruController::class, 'index'])->name('jadwal.table');
    Route::get('/jadwal/tambah', [JadwalGuruController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalGuruController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/edit/{id}', [JadwalGuruController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalGuruController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/hapus/{jadwal}', [JadwalGuruController::class, 'destroy'])->name('jadwal.destroy');
});

// ===================== ROLE SISWA =====================
Route::middleware(['auth', 'cekrole:Siswa'])->group(function () {
    // Data Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.table');
    Route::get('/siswa/tambah', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/hapus/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.table');
    Route::get('/absensi/tambah', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi/edit/{id}', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('/absensi/hapus/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
});