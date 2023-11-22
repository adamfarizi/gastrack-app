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

    // public function create(Request $request)
    // {
    //     // Validasi data jika diperlukan
    //     $request->validate([
    //         'resi_transaksi' => 'required',
    //         'tanggal_transaksi' => 'required',
    //         'nama_pelanggan' => 'required',
    //         'email_pelanggan' => 'required|email',
    //         'alamat_pelanggan' => 'required',
    //         // Sesuaikan dengan field yang diperlukan untuk transaksi
    //     ]);

    //     // Cari atau buat pelanggan baru berdasarkan email
    //     $pelanggan = Pelanggan::firstOrCreate(
    //         ['email' => $request->input('email_pelanggan')],
    //         [
    //             'nama' => $request->input('nama_pelanggan'),
    //             'alamat' => $request->input('alamat_pelanggan'),
    //         ]
    //     );

    //     // Simpan data transaksi
    //     $transaksi = Transaksi::create([
    //         'resi_transaksi' => $request->input('resi_transaksi'),
    //         'tanggal_transaksi' => $request->input('tanggal_transaksi'),
    //         'pelanggan_id' => $pelanggan->id,
    //         // Sesuaikan dengan field yang diperlukan untuk transaksi
    //     ]);

    //     return response()->json(['message' => 'Transaksi berhasil ditambahkan', 'data' => $transaksi], 201);
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
