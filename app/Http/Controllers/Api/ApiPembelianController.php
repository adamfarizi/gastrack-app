<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\Tagihan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiPembelianController extends Controller
{

    public function create_transaksi(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'jumlah_pesanan' => 'required|integer|min:1',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Pembuatan resi dengan UUID
            $resi_transaksi = 'GTK-' . now()->format('YmdHis') . Str::random(2);

            // Dapatkan nilai id_tagihan terakhir
            $last_tagihan_id = Tagihan::max('id_tagihan');
            $new_tagihan_id = $last_tagihan_id + 1;

            // Tambahkan data ke tabel tagihan
            $tagihan = Tagihan::create([
                'id_tagihan' => $new_tagihan_id,
                'id_pelanggan' => $request->input('id_pelanggan'),
                'tanggal_jatuh_tempo' => now()->addDays(30),
                'jumlah_tagihan' => $request->input('jumlah_pesanan') * 500000,
            ]);

            // Tambahkan data ke tabel transaksi
            $transaksi = Transaksi::create([
                'resi_transaksi' => $resi_transaksi,
                'tanggal_transaksi' => now(),
                'id_pelanggan' => $request->input('id_pelanggan'),
                'jumlah_pesanan' => $request->input('jumlah_pesanan'),
                'harga_pesanan' => $request->input('harga_pesanan'),
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

    public function index_tagihanPelanggan(string $id){
        $pelanggan = Tagihan::where('id_pelanggan', $id)
        ->where('status_tagihan', "Belum Bayar")
        ->first();
    
        if (empty($pelanggan)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }
        else{
            $formattedJumlahTagihan = number_format($pelanggan->jumlah_tagihan, 0, ',', '.');
            Carbon::setLocale('id');
            $formattedTanggalJatuhTempo = Carbon::parse($pelanggan->tanggal_jatuh_tempo)->isoFormat('DD MMMM YYYY');
    
            // Update data pelanggan dengan format baru
            $pelanggan->tanggal_jatuh_tempo = $formattedTanggalJatuhTempo;
            $pelanggan->jumlah_tagihan = $formattedJumlahTagihan;
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $pelanggan,
            ], 200);
        }
    }
}