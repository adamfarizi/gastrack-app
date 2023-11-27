<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        $data['title'] = 'Pembelian';

        $transaksis = Transaksi::all();
        $pesanans = Pesanan::all();

        return view('auth.beranda.beranda',[
            'transaksis' => $transaksis,
            'pesanans' => $pesanans,
        ], $data);
    }

}
