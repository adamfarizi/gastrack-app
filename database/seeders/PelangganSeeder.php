<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $pelanggan = [
        [
            'nama' => 'PT. Selep Nglames',
            'email' => 'agen1@example.com',
            'password' => bcrypt('pelanggan123'),
            'alamat' => 'Jl. Merdeka No. 123, Kelurahan Bahagia, Kecamatan Sentosa, Kota Fiktif A',
            'no_hp' => '088111222',
        ],[
            'nama' => 'PT. Sinar Patihan',
            'email' => 'agen2@example.com',
            'password' => bcrypt('pelanggan123'),
            'alamat' => 'Jl. Singosari No. 2, Kelurahan Patihan, Kecamatan Manguharjo, Kota Madiun',
            'no_hp' => '088112232',
        ],
        ];

        foreach ($pelanggan as $data) {
            Pelanggan::create($data);
        } 
    }
}
