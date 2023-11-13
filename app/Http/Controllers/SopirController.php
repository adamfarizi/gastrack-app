<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopirController extends Controller
{
    public function index() {
        $data['title'] = 'Sopir';

        return view('auth.sopir.sopir', $data);
    }
}
