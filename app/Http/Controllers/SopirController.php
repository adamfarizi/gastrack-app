<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    public function index() {
        $data['title'] = 'Sopir';

        // Navbar
        $total_sopir = Sopir::count();

        $sopir = Sopir::all();

        return view('auth.sopir.sopir', [
            'sopirs'=>$sopir,
            'total_sopir'=>$total_sopir,
        ], $data);
    }
}
