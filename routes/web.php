<?php

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

Route::get('/', function () { return view('guest.login'); });
Route::get('/signup', function () { return view('guest.signup'); });
Route::get('/beranda', function () { return view('auth.beranda.beranda'); });
Route::get('/pembelian', function () { return view('auth.pembelian.pembelian'); });
Route::get('/pengiriman', function () { return view('auth.pengiriman.pengiriman'); });
Route::get('/laporan', function () { return view('auth.laporan.laporan'); });
Route::get('/sopir', function () { return view('auth.sopir.sopir'); });
Route::get('/pengguna', function () { return view('auth.pengguna.pengguna'); });
Route::get('/profil', function () { return view('auth.profil.profil'); });
