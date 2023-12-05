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