<?php

namespace Database\Seeders;

use App\Models\Pengiriman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengirimanSeeder extends Seeder
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
                'kode_pengiriman' => 'GT-'.now().'-21304311',
                'status_pengiriman' => 'Proses',
            ],
            [
                'kode_pengiriman' => 'GT-'.now().'-31150322',
                'status_pengiriman' => 'Proses',
            ],
        ];
        
        Pengiriman::insert($data);
    }
}
