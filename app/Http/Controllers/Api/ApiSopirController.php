<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sopir;
use App\Models\Pengiriman;
use App\Http\Resources\PostResource;
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

        $pengiriman->kapasitas_gas_masuk = $request->kapasitas_gas_masuk;
    
        $pengiriman->save();
    
        return response()->json(['message' => 'Data pengiriman berhasil diupdate']);
    }

    public function gas_keluar(Request $request, $id_pengiriman)
    {
        // Validasi request
        $request->validate([
            'kapasitas_gas_keluar' => 'string',
            'bukti_gas_keluar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status_pengiriman' => 'string',
        ]);
    
        // Ambil data pengiriman berdasarkan ID
        $pengiriman = Pengiriman::find($id_pengiriman);
    
        if (!$pengiriman) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        // Perhitungan sisa_gas
        $sisa_gas = $pengiriman->kapasitas_gas_masuk - $request->kapasitas_gas_keluar;

        // Update data pengiriman
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

        $pengiriman->status_pengiriman = $request->status_pengiriman;
    
        $pengiriman->save();
    
        return response()->json([
            'message' => 'Data pengiriman berhasil diupdate',
            'sisa_gas' => $sisa_gas,
        ]);
    }

}