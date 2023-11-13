<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index() {
        $data['title'] = 'Pengguna';

        return view('auth.pengguna.pengguna', $data);
    }
}
