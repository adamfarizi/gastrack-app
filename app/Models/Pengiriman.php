<?php
// app/Models/Pengiriman.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id_pengiriman';
    
    protected $fillable = [
        'kode_pengiriman',
        'kapasitas_gas_masuk',
        'bukti_gas_masuk',
        'kapasitas_gas_keluar',
        'bukti_gas_keluar',
        'status_pengiriman',
        'sisa_gas',
        'id_pesanan',
        'id_sopir',
        'id_mobil',
    ];

    public function pesanan()
    {
        return $this->hasOne(Pesanan::class, 'id_pesanan');
    }

    public function sopir()
    {
        return $this->hasOne(Sopir::class, 'id_sopir');
    }

    public function mobil()
    {
        return $this->hasOne(Mobil::class, 'id_mobil');
    }
}
