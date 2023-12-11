<?php

namespace App\Http\Controllers\Api;

use App\Events\GasKeluarEvent;
use App\Events\GasMasukEvent;
use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Sopir;
use App\Models\Pengiriman;
use App\Http\Resources\PostResource;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiSopirController extends Controller
{
    public function index()
    {
        $dateupdate = Sopir::all();

        if ($dateupdate) {
            return new PostResource(true, 'Get Berhasil', $dateupdate);
        } else {
            return response()->json("Not Found 404");
        }
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $sopir = Sopir::where('email', $request->email)->first();

        if (!$sopir) {
            return response()->json([
                'success' => false,
                'message' => 'Akun tidak terdaftar!',
            ], 404);
        }

        // Verifikasi password
        if (password_verify($request->password, $sopir->password)) {
            $token = $sopir->createToken('myappToken')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'datauser' => $sopir,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kombinasi email dan password tidak valid!',
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            // Revoke the user's access tokens
            $user->tokens()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil.',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal logout. Pengguna tidak ditemukan.',
            ], 401);
        }
    }

    public function getDataPengiriman(string $id)
    {
        Carbon::setLocale('id');
        $pengiriman = Pengiriman::where('status_pengiriman', 'Dikirim')
            ->where('id_sopir', $id)
            ->join('pesanan', 'pengiriman.id_pesanan', '=', 'pesanan.id_pesanan')
            ->join('transaksi', 'pesanan.id_transaksi', '=', 'transaksi.id_transaksi')
            ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->orderByDesc('pengiriman.created_at');
    
        if (!$pengiriman->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Belum ada pesanan!',
            ], 422);
        } else {
            $data = $pengiriman
                ->select(
                    'transaksi.resi_transaksi AS resi',
                    'pelanggan.koordinat',
                    'pelanggan.nama_perusahaan',
                    'pelanggan.alamat AS alamat_perusahaan',
                    'pesanan.jumlah_pesanan',
                    'pesanan.tanggal_pesanan AS tanggal_pemesanaan'
                )->first();
    
            if ($data) {
                $formattedTanggal = Carbon::parse($data->tanggal_pemesanaan)->isoFormat('DD MMMM YYYY');
                $data->tanggal_pemesanaan = $formattedTanggal;
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil ditemukan',
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan!',
                ], 422);
            }
        }
    }
    

    public function gas_masuk(Request $request, $id_pengiriman)
    {
        // Validasi request
        $request->validate([
            'kapasitas_gas_masuk' => 'string',
            'bukti_gas_masuk' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        // Ambil data pengiriman berdasarkan ID
        $pengiriman = Pengiriman::find($id_pengiriman);
    
        if (!$pengiriman) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        if ($request->hasFile('bukti_gas_masuk')) {
            $file = $request->file('bukti_gas_masuk');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img/GasMasuk'), $fileName);

            $pengiriman->update([
                'bukti_gas_masuk' => $fileName,
            ]);
        }

        $pengiriman->waktu_pengiriman = now();
        $pengiriman->kapasitas_gas_masuk = $request->kapasitas_gas_masuk;
        $pengiriman->save();
        
        $nama_sopir = $pengiriman->sopir->nama;
        broadcast(new GasMasukEvent($nama_sopir));
    
        return response()->json(['message' => 'Data pengiriman berhasil diupdate']);
    }

    public function gas_keluar(Request $request, $id_pengiriman)
    {
        // Validasi request
        $request->validate([
            'kapasitas_gas_keluar' => 'string',
            'bukti_gas_keluar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        // Ambil data pengiriman berdasarkan ID
        $pengiriman = Pengiriman::where('id_pengiriman', $id_pengiriman)
        ->join('sopir', 'pengiriman.id_sopir', '=', 'sopir.id_sopir')
        ->join('mobil', 'pengiriman.id_mobil', '=', 'mobil.id_mobil')
        ->first();
    
        if (!$pengiriman) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        // Perhitungan sisa_gas
        $sisa_gas = $pengiriman->kapasitas_gas_masuk - $request->kapasitas_gas_keluar;

        // Update data pengiriman
        $pengiriman->waktu_diterima = now();
        $pengiriman->kapasitas_gas_keluar = $request->kapasitas_gas_keluar;
        $pengiriman->sisa_gas = $sisa_gas;

        if ($request->hasFile('bukti_gas_keluar')) {
            $file = $request->file('bukti_gas_keluar');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img/GasKeluar'), $fileName);

            $pengiriman->update([
                'bukti_gas_keluar' => $fileName,
            ]);
        }

        $pengiriman->status_pengiriman = 'Diterima';
        $pengiriman->sopir->ketersediaan_sopir = 'tersedia';
        $pengiriman->mobil->ketersediaan_mobil = 'tersedia';
        $pengiriman->push();
        
        $pesanan = Pesanan::where('id_pesanan', $pengiriman->id_pesanan)->first();
        $transaksi = Transaksi::where('id_transaksi', $pesanan->id_transaksi)->first();
        $nama_perusahaan = $transaksi->pelanggan->nama_perusahaan;
        broadcast(new GasKeluarEvent($nama_perusahaan));

        return response()->json([
            'message' => 'Data pengiriman berhasil diupdate',
            'sisa_gas' => $sisa_gas,
        ]);
    }

}