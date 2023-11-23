<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index() {
        $data['title'] = 'Pembelian';

        $transaksis = Transaksi::all();
        $pesanans = Pesanan::all();

        return view('auth.pembelian.pembelian',[
            'transaksis' => $transaksis,
            'pesanans' => $pesanans,
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
    
    public function detail_pesanan($id_transaksi)
    {
        $data['title'] = 'Pembelian';
        $transaksis = Transaksi::where('id_transaksi', $id_transaksi)->get();
        $pesananAwal = Pesanan::where('id_transaksi', $id_transaksi)->orderBy('tanggal_pesanan', 'asc')->first();
        $pesanans = Pesanan::where('id_transaksi', $id_transaksi)->get();
        $pesananAkhir = Pesanan::where('id_transaksi', $id_transaksi)->orderBy('tanggal_pesanan', 'desc')->first();

        return view('auth.pembelian.lihat_pesanan',[
            'transaksis' => $transaksis,
            'pesananAwal' => $pesananAwal,
            'pesanans' => $pesanans,
            'pesananAkhir' => $pesananAkhir,
        ], $data);
    }
}
