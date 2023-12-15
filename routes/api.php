<?php

use App\Http\Controllers\Api\ApiPelangganController;
use App\Http\Controllers\Api\ApiPembelianController;
use App\Http\Controllers\Api\ApiSopirController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/pelanggan/login', [ApiPelangganController::class, 'login_action']);
Route::post('/sopir/login', [ApiSopirController::class, 'login_action']);

Route::middleware(['auth:sanctum', 'check.pelanggan'])->group(function () {
    Route::post('/pelanggan/logout', [ApiPelangganController::class, 'logout']);
    Route::get('/pelanggan/update/{id}', [ApiPelangganController::class, 'edit_index']);
    Route::put('/pelanggan/update/{id}', [ApiPelangganController::class, 'edit_action']);
    Route::get('/pelanggan/index/{id}', [ApiPembelianController::class, 'index_transaksi']);
    Route::get('/pembelian/belum_bayar', [ApiPembelianController::class, 'transaksi_belum_bayar']);
    Route::get('/pembelian/sudah_bayar', [ApiPembelianController::class, 'transaksi_sudah_bayar']);
    Route::post('/pembelian/create', [ApiPembelianController::class, 'create_transaksi']);
    Route::post('/pembelian/update_pembayaran/{id}', [ApiPembelianController::class, 'update_pembayaran']);
});

Route::middleware(['auth:sanctum', 'check.sopir'])->group(function(){
    Route::get('/sopir/index', [ApiSopirController::class, 'index']);
    Route::post('/sopir/logout', [ApiSopirController::class, 'logout']);
    Route::get('/sopir/update/{id}', [ApiSopirController::class, 'edit_index']);
    Route::get('/sopir/pengiriman/{id}', [ApiSopirController::class, 'getDataPengiriman']);
    Route::post('/sopir/update_gas_masuk/{id}', [ApiSopirController::class, 'gas_masuk']);
    Route::post('/sopir/update_gas_keluar/{id}', [ApiSopirController::class, 'gas_keluar']);
});