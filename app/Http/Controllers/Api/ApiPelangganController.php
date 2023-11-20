<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Validator; // Pastikan ini sudah diimpor

class ApiPelangganController extends Controller
{
    public function create_transaksi(Request $request)
    {
        
        $request->validate([
            'id_pelanggan' => 'required|integer|min:1',
            'jumlah_transaksi' => 'required|integer|min:1',
        ]);

        $id_pelanggan = $request->input('id_pelanggan');
        $tanggal_transaksi = now();
        $tanggal_transaksi_carbon = Carbon::parse($tanggal_transaksi);

        $batas_pembayaran = $tanggal_transaksi_carbon->addDays(14);

        // Penghitungan total transaksi
        $jumlah_transaksi = intval($request->input('jumlah_transaksi'));
        $harga = 50000;
        $total_transaksi = $jumlah_transaksi * (float) $harga;

        $cek_tagihan = Transaksi::where('id_pelanggan', $id_pelanggan)
            ->whereHas('tagihan', function ($query) {
                $query->where('status_tagihan', 'Belum Bayar');
            })
            ->first();

        if ($cek_tagihan == null) {

            $id_pembayaran_new = Tagihan::create([
                'tanggal_jatuh_tempo' => $batas_pembayaran,
                'jumlah_tagihan' => null,
                'status_tagihan' => 'Belum Bayar',
                'tanggal_pembayaran' => null,
                'bukti_pembayaran' => null,
                'id_pelanggan' => $id_pelanggan
            ])->id_pembayaran;

            $transaksi_new = Transaksi::create([
                'jumlah_transaksi' => $jumlah_transaksi,
                'tanggal_transaksi' => $tanggal_transaksi,
                'total_transaksi' => $total_transaksi,
                'id_pembayaran' => $id_pembayaran_new,
                'id_pelanggan' => $id_pelanggan,
                'jenis_transaksi' => 'awal'
            ]);

            $total_pembayaran = Transaksi::where('id_pembayaran', $id_pembayaran_new)
                ->sum('total_transaksi');

            $pembayaran = Tagihan::find($id_pembayaran_new);
            if (empty($pembayaran)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan!',
                ], 422);
            } else {
                $pembayaran->total_pembayaran = $total_pembayaran;
                $pembayaran->save();
            }

        } else {
            if ($tanggal_transaksi > $cek_tagihan['batas_pembayaran']) {
                return response()->json([
                    'message' => 'Anda belum melunasi tagihan sebelumnya',
                ], 200);
            } else {
                $cek_transaksi = Transaksi::where('id_pelanggan', 'tanggal_transaksi', $tanggal_transaksi)
                    ->first();

                if ($cek_transaksi != null) {

                    $transaksi_new = Transaksi::create([
                        'jumlah_transaksi' => $jumlah_transaksi,
                        'tanggal_transaksi' => $tanggal_transaksi,
                        'total_transaksi' => $total_transaksi,
                        'id_pembayaran' => $cek_tagihan['id_pembayaran'],
                        'id_pelanggan' => $id_pelanggan,
                        'jenis_transaksi' => 'akhir'
                    ]);

                    $total_pembayaran = Transaksi::where('id_pembayaran', $cek_tagihan['id_pembayaran'])
                        ->sum('total_transaksi');

                    $pembayaran = Tagihan::find($cek_tagihan['id_pembayaran']);
                    if (empty($pembayaran)) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Data tidak ditemukan!',
                        ], 422);
                    } else {
                        $pembayaran->total_pembayaran = $total_pembayaran;
                        $pembayaran->save();
                    }

                } else {
                    $transaksi_new = Transaksi::create([
                        'jumlah_transaksi' => $jumlah_transaksi,
                        'tanggal_transaksi' => $tanggal_transaksi,
                        'total_transaksi' => $total_transaksi,
                        'id_pembayaran' => $cek_tagihan['id_pembayaran'],
                        'id_pelanggan' => $id_pelanggan,
                        'jenis_transaksi' => 'awal'
                    ]);

                    $total_pembayaran = Transaksi::where('id_pembayaran', $cek_tagihan['id_pembayaran'])
                        ->sum('total_transaksi');

                    $pembayaran = Tagihan::find($cek_tagihan['id_pembayaran']);
                    if (empty($pembayaran)) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Data tidak ditemukan!',
                        ], 422);
                    } else {
                        $pembayaran->total_pembayaran = $total_pembayaran;
                        $pembayaran->save();
                    }

                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambah',
            'data' => $transaksi_new,
        ], 200);
    }
}
