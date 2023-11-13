<?php
// app/Models/Truck.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';
    
    protected $fillable = [
        'identitas_mobil',
        'nopol_mobil',
        'status_mobil',
        'jenis_mobil',
    ];
    
    public function pengirimans()
    {
        return $this->belongsTo(Pengiriman::class, 'id_mobil');
    }
}
