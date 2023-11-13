<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        $data['title'] = 'Dashboard';


        return view('auth.beranda.beranda', $data);
    }
}
