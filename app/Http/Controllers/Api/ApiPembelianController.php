<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Tagihan;
use App\Models\Pesanan;
use App\Events\newTranEvent;
use App\Events\updateTranEvent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiPembelianController extends Controller
{

    public function index_transaksi($id_pelanggan)
    {
        try {
            // Ambil semua data transaksi berdasarkan id_pelanggan
            $transaksi = Transaksi::where('id_pelanggan', $id_pelanggan)->get();

            return response()->json([
                'success' => true,
                'message' => 'Data transaksi berhasil diambil',
                'data' => $transaksi,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data transaksi',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
        
    public function create_transaksi(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'jumlah_pesanan' => 'required|integer|min:1',
            'durasi_jatuh_tempo' => 'required|in:2,3,4', // Menambahkan validasi durasi
        ]);

        // Cek jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Periksa apakah masih dalam batas waktu dua minggu dari pembelian sebelumnya
            $batas_waktu = now()->subWeeks(2);
            $transaksi_terakhir = Transaksi::where('id_pelanggan', $request->input('id_pelanggan'))
                ->orderBy('tanggal_transaksi', 'desc')
                ->first();

            // Cek jika ada transaksi sebelumnya dan masih dalam dua minggu
            if ($transaksi_terakhir && $transaksi_terakhir->tanggal_transaksi > $batas_waktu) {
                // Jika masih dalam dua minggu, pesanan baru tetap dapat dibuat
                // tanpa memeriksa status pembayaran pesanan sebelumnya.
            } else {
                // Jika tidak ada transaksi sebelumnya atau sudah lebih dari dua minggu,
                // periksa apakah ada pesanan yang belum dilunasi
                $belum_lunas = Tagihan::where('id_pelanggan', $request->input('id_pelanggan'))
                    ->whereNull('tanggal_pembayaran')
                    ->exists();

                if ($belum_lunas) {
                    throw new \Exception('Anda harus melunasi pesanan sebelumnya terlebih dahulu.');
                }
            }

            // Periksa jika ada pesanan yang melewati jatuh tempo dan belum dibayar
            $pesanan_lewat_jatuh_tempo = Tagihan::where('id_pelanggan', $request->input('id_pelanggan'))
                ->where('tanggal_jatuh_tempo', '<', now())
                ->exists();

            // Periksa status pesanan yang sudah dibayar
            $status_pesanan_dibayar = Tagihan::where('id_pelanggan', $request->input('id_pelanggan'))
                ->where('tanggal_jatuh_tempo', '<', now())
                ->where('status_tagihan', 'Sudah Bayar')
                ->exists();

            // Jika pesanan lewat jatuh tempo dan belum dibayar, tidak bisa memesan lagi
            if ($pesanan_lewat_jatuh_tempo && !$status_pesanan_dibayar) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pesanan melewati batas waktu pembayaran. Tidak dapat memesan lagi.',
                ], 422);
            }

            // Pembuatan resi dengan UUID
            $resi_transaksi = 'GTK-' . now()->format('YmdHis') . Str::random(2);

            // Dapatkan nilai id_tagihan terakhir
            $last_tagihan_id = Tagihan::max('id_tagihan');
            $new_tagihan_id = $last_tagihan_id + 1;

            // Tentukan durasi berdasarkan input
            $durasi_jatuh_tempo = $request->input('durasi_jatuh_tempo');

            // Tetapkan tanggal_jatuh_tempo, otomatis ditambahkan sesuai durasi
            $tanggal_jatuh_tempo = now()->addWeeks($durasi_jatuh_tempo);

            // Tambahkan data ke tabel tagihan
            $status_tagihan = 'Belum Bayar';

            $tagihan = Tagihan::create([
                'id_tagihan' => $new_tagihan_id,
                'id_pelanggan' => $request->input('id_pelanggan'),
                'tanggal_jatuh_tempo' => $tanggal_jatuh_tempo,
                'jumlah_tagihan' => $request->input('jumlah_pesanan') * 500000,
                'status_tagihan' => $status_tagihan,
            ]);

            // Tambahkan data ke tabel transaksi
            $transaksi = Transaksi::create([
                'resi_transaksi' => $resi_transaksi,
                'tanggal_transaksi' => now(),
                'id_pelanggan' => $request->input('id_pelanggan'),
                'jumlah_pesanan' => $request->input('jumlah_pesanan'),
                'harga_pesanan' => $request->input('harga_pesanan'), // Sesuaikan ini dengan kebutuhan
                'id_tagihan' => $new_tagihan_id,
                'id_admin' => 1,
            ]);

            // Commit transaksi jika tidak ada kesalahan
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambah',
                'data' => $transaksi,
            ], 201);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat transaksi',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function transaksi_belum_bayar($id_pelanggan = null)
    {
        $query = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Belum Bayar');
        })
            ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran');

        // Menambahkan kondisi berdasarkan id_pelanggan jika disediakan
        if ($id_pelanggan !== null) {
            $query->where('pelanggan.id_pelanggan', $id_pelanggan);
        }

        $belum_bayar = $query
            ->select([
                'transaksi.id_transaksi',
                'agen.name AS nama_agen',
                'transaksi.tanggal_transaksi',
                'transaksi.status_pengiriman',
                'transaksi.resi_transaksi',
                'gas.name_gas AS nama_gas',
                'gas.jenis_gas',
                'pembayaran.status_pembayaran',
                'transaksi.jumlah_transaksi',
                'transaksi.total_transaksi'
            ])
            ->orderBy('transaksi.tanggal_transaksi', 'desc')
            ->get();

        if ($belum_bayar->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $belum_bayar,
            ], 200);
        }
    }

}