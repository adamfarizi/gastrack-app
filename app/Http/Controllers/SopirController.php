<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    public function index() {
        $data['title'] = 'Sopir';

        return view('auth.sopir.sopir', $data);
    }

    public function edit_sopir($id_sopir, Request $request)
    {
        $data['title'] = 'Sopir';

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
        ]);
    
        $sopir = Sopir::find($id_sopir);
        $sopir->nama = $request->input('nama');
        $sopir->email = $request->input('email');
        $sopir->no_hp = $request->input('no_hp');      
        $sopir->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function edit_kendaraan() {
        $data['title'] = 'Sopir';

        return view('auth.sopir.edit.edit_kendaraan', $data);
    }

}
