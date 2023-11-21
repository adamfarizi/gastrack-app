<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index() {
        $data['title'] = 'Pembelian';

        $transaksis = Transaksi::all();

        return view('auth.pembelian.pembelian',[
            'transaksis' => $transaksis,
        ], $data);
    }

    public function realtimeData() {
        $total_pesanan = Transaksi::count();
        $pesanan_masuk = Transaksi::whereHas('tagihan', function ($query) {
            $query->whereIn('status_tagihan', ['Belum Bayar']);
        })->count();
        $total_pelanggan = Pelanggan::count();
        $transaksis = Transaksi::with('pelanggan', 'tagihan')->get();

        return response()->json([
            'transaksis' => $transaksis,
            'total_pesanan' => $total_pesanan,
            'pesanan_masuk' => $pesanan_masuk,
            'total_pelanggan' => $total_pelanggan,
        ]);
    }
}
