<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CetakAbsensiController;
use App\Http\Controllers\AkunController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/karyawan/index', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/profile-image/{userId}', [ProfileController::class, 'getProfileImage'])->name('profile.image');
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/tambah-absensi', [AbsensiController::class, 'tambahAbsensi'])->name('tambah.absensi');
Route::get('/cetak-absensi', [CetakAbsensiController::class, 'cetakAbsensi'])->name('cetak.absensi');

Route::middleware(['auth', 'karyawan'])->group(function () {
    Route::get('/karyawan/dashboard', [KaryawanController::class, 'dashboard'])->name('karyawan.dashboard');
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/karyawan', [AdminController::class, 'karyawan'])->name('admin.karyawan');
});

Route::get('/admin/akun', [AkunController::class, 'akun'])->name('admin.akun');

