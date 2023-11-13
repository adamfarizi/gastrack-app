<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        $data['title'] = 'Profil';

        return view('auth.profil.profil', $data);
    }
}
