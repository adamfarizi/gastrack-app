<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Carbon\Carbon;

class ApiSupirController extends Controller
{
    public function getDataPengiriman(string $id){
        Carbon::setLocale('id');
        $pengiriman = Pengiriman::where('id_sopir', $id)
        ->join('pesanan', 'pengiriman.id_pesanan', '=', 'pesanan.id_pesanan')
        ->join('transaksi', 'pesanan.id_transaksi', '=', 'transaksi.id_transaksi')
        ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id_pelanggan');

        $data = $pengiriman
        ->select(
            'transaksi.resi_transaksi AS resi',
            'pelanggan.koordinat',
            'pelanggan.nama_perusahaan',
            'pelanggan.alamat AS alamat_perusahaan',
            'pesanan.jumlah_pesanan',
            'pesanan.tanggal_pesanan AS tanggal_pemesanaan'
        )->first();

        $cek_data = Pengiriman::where('id_sopir', $id)->first();
    
        if (empty($cek_data)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }
        else{
            $formattedTanggal = Carbon::parse($data->tanggal_pemesanaan)->isoFormat('DD MMMM YYYY');
            $data->tanggal_pemesanaan = $formattedTanggal;
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $data,
            ], 200);
        }
    }
}
