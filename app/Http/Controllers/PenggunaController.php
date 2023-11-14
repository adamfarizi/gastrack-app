<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index() {
        $data['title'] = 'Pengguna';

        return view('auth.pengguna.pengguna', $data);
    }

    public function edit_pengguna() {
        $data['title'] = 'Pengguna';

        return view('auth.pengguna.edit.edit_pengguna', $data);
    }

    public function edit_admin() {
        $data['title'] = 'Pengguna';

        return view('auth.pengguna.edit.edit_admin', $data);
    }
}
