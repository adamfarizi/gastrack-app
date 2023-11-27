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
        'id_pelanggan',
        'id_tagihan',
        'id_admin',
    ];
    
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_transaksi');
    }

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id_pelanggan');
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id_tagihan');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id_admin');
    }
}
