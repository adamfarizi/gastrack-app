<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index() {
        $data['title'] = 'Pembelian';

        return view('auth.pembelian.pembelian', $data);
    }
}
