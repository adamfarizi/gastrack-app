<?php

use App\Http\Controllers\Api\ApiPelangganController;
use App\Http\Controllers\Api\ApiSupirController;
use App\Http\Controllers\Api\ApiPembelianController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/pelanggan/logout', [ApiPelangganController::class, 'logout']);
    Route::get('/pelanggan/update/{id}', [ApiPelangganController::class, 'edit_index']);
    Route::get('/pelanggan/detail/{id}', [ApiPelangganController::class, 'detail_user']);
    Route::put('/pelanggan/update/perusahaan/{id}',[ApiPelangganController::class, 'edit_perusahaan']);
    Route::put('/pelanggan/update/name/{id}',[ApiPelangganController::class, 'edit_name']);
    Route::put('/pelanggan/update/email/{id}',[ApiPelangganController::class, 'edit_email']);
    Route::put('/pelanggan/update/no_hp/{id}',[ApiPelangganController::class, 'edit_no_hp']);
    Route::put('/pelanggan/update/alamat/{id}',[ApiPelangganController::class, 'edit_alamat']);
    Route::put('/pelanggan/update/password/{id}',[ApiPelangganController::class, 'edit_password']);


    Route::post('/pelanggan/pesan', [ApiPembelianController::class, 'create_transaksi']);
    Route::get('/pelanggan/tagihan/{id}', [ApiPembelianController::class, 'index_tagihanPelanggan']);
});

Route::get('/sopir/pengiriman/{id}', [ApiSupirController::class, 'getDataPengiriman']);