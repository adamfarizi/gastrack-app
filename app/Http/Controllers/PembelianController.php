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

        $transaksiPerHari = Transaksi::select(
            'id_pelanggan',
            DB::raw('DATE_FORMAT(tanggal_transaksi, "%Y-%m-%d") as tanggal'),
            DB::raw('SUM(jumlah_transaksi) as total_transaksi')
        )
        ->whereNotNull('id_pelanggan')
        ->groupBy('id_pelanggan', 'tanggal')
        ->get();

        return view('auth.pembelian.pembelian',[
            'transaksis' => $transaksis,
            'transaksiPerHari' => $transaksiPerHari,
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
