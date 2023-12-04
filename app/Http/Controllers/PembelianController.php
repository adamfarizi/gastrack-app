<?php

namespace App\Http\Controllers;

use App\Events\Chart2Event;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Events\newTranEvent;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pembelian';

        $transaksis = Transaksi::all();
        $pesanans = Pesanan::all();

        return view('auth.pembelian.pembelian', [
            'transaksis' => $transaksis,
            'pesanans' => $pesanans,
        ], $data);
    }

    public function realtimeData()
    {
        $total_pesanan = Transaksi::count();
        $pesanan_masuk = Pesanan::whereHas('pengiriman', function ($query) {
            $query->whereIn('status_pengiriman', ['Proses']);
        })->count();
        $total_pelanggan = Pelanggan::count();
        $transaksis = Transaksi::with('pelanggan', 'tagihan')->whereHas('tagihan', function ($query) {
            $query->whereIn('status_tagihan', ['Belum Bayar']);
        })->get();
        $riwayat_transaksis = Transaksi::with('pelanggan', 'tagihan')->whereHas('tagihan', function ($query) {
            $query->whereIn('status_tagihan', ['Sudah Bayar']);
        })->get();

        return response()->json([
            'total_pesanan' => $total_pesanan,
            'pesanan_masuk' => $pesanan_masuk,
            'total_pelanggan' => $total_pelanggan,
            'transaksis' => $transaksis,
            'riwayat_transaksis' => $riwayat_transaksis,
        ]);
    }

    public function detail_pesanan($id_transaksi)
    {
        $data['title'] = 'Pembelian';
        $transaksis = Transaksi::where('id_transaksi', $id_transaksi)->get();
        $pesananAwal = Pesanan::where('id_transaksi', $id_transaksi)->orderBy('tanggal_pesanan', 'asc')->first();
        $pesanans = Pesanan::where('id_transaksi', $id_transaksi)->get();
        $pesananAkhir = Pesanan::where('id_transaksi', $id_transaksi)->orderBy('tanggal_pesanan', 'desc')->first();

        return view('auth.pembelian.more.pesanan', [
            'transaksis' => $transaksis,
            'pesananAwal' => $pesananAwal,
            'pesanans' => $pesanans,
            'pesananAkhir' => $pesananAkhir,
        ], $data);
    }

    public function detail_tagihan($id_transaksi)
    {
        $data['title'] = 'Pembelian';

        $transaksis = Transaksi::where('id_transaksi', $id_transaksi)->get();
        $pesanans = Pesanan::where('id_transaksi', $id_transaksi)->get();

        return view('auth.pembelian.more.tagihan', [
            'transaksis' => $transaksis,
            'pesanans' => $pesanans,
        ], $data);
    }

    public function konfirmasi_pembayaran($id_transaksi)
    {
        $transaksi = Transaksi::find($id_transaksi);

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan !');
        } else {
            if ($transaksi->tagihan->bukti_pembayaran == null) {
                return redirect()->back()->with('error', 'Tidak ada bukti pembayaran !');
            } else {
                $transaksi->tagihan->status_tagihan = "Sudah Bayar";
                $transaksi->tagihan->save();

                $nama_perusahaan = $transaksi->pelanggan->nama_perusahaan;
                $jumlah_tagihan = $transaksi->tagihan->jumlah_tagihan;
                $bulan = Carbon::parse($transaksi->tagihan->tanggal_pembayaran)->format('M Y');
                broadcast(new Chart2Event($nama_perusahaan, $jumlah_tagihan, $bulan));

                return redirect()->route('pembelian')->with('success', 'Pembayaran berhasil dikonfirmasi !');
            }
        }
    }
}
