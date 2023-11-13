<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    
    protected $fillable = [
        'lokasi_pengambilan',
        'koordinat_lokasi',
        'alamat_tujuan',
        'status',
    ];
}
