<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminId = 1;
        $id_pelanggan = 1;

        $data = [
            [
                'resi_transaksi' => 'GT-2502351',
                'tanggal_transaksi' => now(),
                'jumlah_transaksi' => 5,
                'total_transaksi' => 500000,
                'jadwal_bayar' => '2 Minggu',
                'id_pelanggan' => Pelanggan::first()->id_pelanggan,
                'id_tagihan' => 1,
                'id_pengiriman' => null,
                'id_admin' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'resi_transaksi' => 'GT-3122153',
                'tanggal_transaksi' => now(),
                'jumlah_transaksi' => 3,
                'total_transaksi' => 300000,
                'jadwal_bayar' => '4 Minggu',
                'id_pelanggan' => Pelanggan::first()->id_pelanggan,
                'id_tagihan' => 2,
                'id_pengiriman' => null,
                'id_admin' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        Transaksi::insert($data);
        
    }
}
