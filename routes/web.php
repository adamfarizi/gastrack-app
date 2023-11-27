<?php

use App\Http\Controllers\Api\ApiPelangganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SopirController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class,'login'])->name('login');
    Route::post('login_action', [AuthController::class,'login_action']);
    Route::get('/signup', [AuthController::class,'signup']);
    Route::post('signup_action', [AuthController::class,'signup_action']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('/beranda', [BerandaController::class,'index'])->name('beranda');

    Route::get('/pembelian', [PembelianController::class,'index'])->name('pembelian');
    Route::get('/pembelian/data', [PembelianController::class,'realtimeData']);
    Route::post('/pembelian/tambah_data', [PembelianController::class, 'create']);
    Route::get('/pembelian/lihat_pesanan/{id}', [PembelianController::class, 'detail_pesanan']);
    
    Route::get('/pengiriman', [PengirimanController::class,'index'])->name('pengiriman');
    Route::get('/pengiriman/data', [PengirimanController::class,'realtimeData']);
    Route::post('/pengiriman/update_kirim/{id}', [PengirimanController::class,'updateKirim']);

    Route::get('/laporan', [LaporanController::class,'index'])->name('laporan');

    Route::get('/sopir&kendaraan', [SopirController::class,'index'])->name('sopir');
    Route::post('/sopir/create', [SopirController::class,'tambah_sopir_action']);
    Route::get('/sopir/edit/{id}', [SopirController::class,'edit_sopir']);
    Route::post('/sopir/edit/{id}', [SopirController::class,'edit_sopir_action']);
    Route::delete('/sopir/delete/{id}', [SopirController::class,'hapus_sopir_action']);
    Route::post('/kendaraan/create', [SopirController::class,'tambah_kendaraan_action']);
    Route::get('/kendaraan/edit/{id}', [SopirController::class,'edit_kendaraan']);
    Route::post('/kendaraan/edit/{id}', [SopirController::class,'edit_kendaraan_action']);
    Route::delete('/kendaraan/delete/{id}', [SopirController::class,'hapus_kendaraan_action']);

    Route::get('/pengguna', [PenggunaController::class,'index'])->name('pengguna');
    Route::post('/pengguna/pelanggan/create', [PenggunaController::class,'tambah_pelanggan_action']);
    Route::get('/pengguna/pelanggan/edit/{id}', [PenggunaController::class,'edit_pelanggan']);
    Route::post('/pengguna/pelanggan/edit/{id}', [PenggunaController::class,'edit_pelanggan_action']);
    Route::delete('/pengguna/pelanggan/delete/{id}', [PenggunaController::class,'hapus_pelanggan_action']);
    Route::post('/pengguna/admin/create', [PenggunaController::class,'tambah_admin_action']);
    Route::get('/pengguna/admin/edit/{id}', [PenggunaController::class,'edit_admin']);
    Route::post('/pengguna/admin/edit/{id}', [PenggunaController::class,'edit_admin_action']);
    Route::delete('/pengguna/admin/delete/{id}', [PenggunaController::class,'hapus_admin_action']);

    Route::get('/profil', [ProfilController::class,'index'])->name('profil');
    
});

Route::post('/transaksi/create', [ApiPelangganController::class,'create_transaksi']);