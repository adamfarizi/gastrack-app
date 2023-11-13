<?php
// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    
    protected $fillable = [
        'resi_transaksi',
        'tanggal_transaksi',
        'jumlah_transaksi',
        'total_transaksi',
        'jadwal_bayar',
        'id_pelanggan',
        'id_tagihan',
        'id_pengiriman',
        'id_admin',
    ];
    
    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id_pelanggan');
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id_tagihan');
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id_pengiriman');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id_admin');
    }
}
