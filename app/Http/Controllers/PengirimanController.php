<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index() {
        $data['title'] = 'Pengiriman';

        return view('auth.pengiriman.pengiriman', $data);
    }
}
