<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Events\newTranEvent;
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

    // public function create_pembelian(Request $request)
    // {
    //     // Validasi permintaan
    //     $validator = Validator::make($request->all(), [
    //         'resi_transaksi' => 'required',
    //         'tanggal_transaksi' => 'required',
    //         'nama_pelanggan' => 'required',
    //         'email_pelanggan' => 'required|email',
    //         'alamat_pelanggan' => 'required',
    //         'status_tagihan' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 400);
    //     }

    //     // Pembuatan resi dengan UUID
    //     $resi_transaksi = 'GTK-' . now()->format('YmdHis') . Str::random(2);

    //     // Penghitungan total transaksi
    //     $jumlah_transaksi = intval($request->input('jumlah_transaksi'));

    //     // Tambahkan data ke tabel transaksi
    //     $transaksi_new = Transaksi::create([
    //         'tanggal_transaksi' => now(),
    //         'resi_transaksi' => $resi_transaksi,
    //         'jumlah_transaksi' => $jumlah_transaksi,
    //         'total_transaksi' => $jumlah_transaksi,
    //         'jadwal_bayar' => $request->input('jadwal_bayar'),
    //         'id_pelanggan' => $request->input('id_pelanggan'),
    //         'id_tagihan' => $request->input('id_tagihan'),
    //         'id_pengiriman' => null,
    //         'id_admin' => 1,
    //     ]);

    //     // Ambil nama agen
    //     $pembeli_new = Pelanggan::where('id_pelanggan', $transaksi_new->id_pelanggan)->value('name');
    //     broadcast(new newTranEvent($pembeli_new));

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data berhasil ditambah',
    //         'datauser' => $transaksi_new,
    //         'databroadcast' => $pembeli_new,
    //     ], 200);
    // }

    public function detail_pesanan()
    {
        $data['title'] = 'Pembelian';
        
        $data['transaksis'] = Transaksi::all();

        // Mengirim data transaksi ke tampilan
        return view('auth.pembelian.lihat_pesanan', $data);
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
