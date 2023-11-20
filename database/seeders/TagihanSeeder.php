<?php

namespace Database\Seeders;

use App\Models\Tagihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'tanggal_jatuh_tempo' => '2023-12-01',
                'jumlah_tagihan' => 500000, // Replace with your desired value
                'status_tagihan' => 'Belum Bayar',
                'tanggal_pembayaran' => null,
                'bukti_pembayaran' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'tanggal_jatuh_tempo' => '2023-12-01',
                'jumlah_tagihan' => 300000, // Replace with your desired value
                'status_tagihan' => 'Belum Bayar',
                'tanggal_pembayaran' => null,
                'bukti_pembayaran' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        
        Tagihan::insert($data);

    }
}
