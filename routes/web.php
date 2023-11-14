<?php

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

    Route::get('/beranda', [BerandaController::class,'index']);

    Route::get('/pembelian', [PembelianController::class,'index']);

    Route::get('/pengiriman', [PengirimanController::class,'index']);

    Route::get('/laporan', [LaporanController::class,'index']);

    Route::get('/sopir&kendaraan', [SopirController::class,'index']);
    Route::post('/sopir/create', [SopirController::class,'tambah_sopir_action']);
    Route::get('/sopir/edit/{id}', [SopirController::class,'edit_sopir']);
    Route::post('/sopir/edit/{id}', [SopirController::class,'edit_sopir_action']);
    Route::delete('/sopir/delete/{id}', [SopirController::class,'hapus_sopir_action']);
    Route::post('/kendaraan/create', [SopirController::class,'tambah_kendaraan_action']);
    Route::get('/kendaraan/edit/{id}', [SopirController::class,'edit_kendaraan']);
    Route::post('/kendaraan/edit/{id}', [SopirController::class,'edit_kendaraan_action']);
    Route::delete('/kendaraan/delete/{id}', [SopirController::class,'hapus_kendaraan_action']);

    Route::get('/pengguna', [PenggunaController::class,'index']);
    Route::get('/pengguna/edit_pengguna', [PenggunaController::class,'edit_pengguna']);
    Route::get('/pengguna/edit_admin', [PenggunaController::class,'edit_admin']);

    Route::get('/profil', [ProfilController::class,'index']);
    
});