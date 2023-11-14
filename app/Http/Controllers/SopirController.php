<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function tambah_sopir_action(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:sopir',
            'no_hp' => 'required', 
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ]);

        $sopir = new Sopir([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp, 
            'password' => Hash::make($request->password), 
        ]);
        
        $sopir->save();
        
        return redirect()->back()->with('success', 'Data berhasil ditambah !');
    }

    public function edit_sopir($id_sopir)
    {
        $data['title'] = 'Edit Sopir';
        $sopir = Sopir::find($id_sopir);

        return view('auth.sopir.edit.edit_sopir', [
            'sopir'=>$sopir
        ], $data); 
    }

    public function edit_sopir_action($id_sopir, Request $request)
    {
    
        if ($request->old_password == null) {
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
    
            return redirect()->back()->with('success', 'Data berhasil diubah !');
        } else {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'no_hp' => 'required|string|max:15',
                'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($id_sopir) {
                        $sopir = Sopir::find($id_sopir);
            
                        if (!Hash::check($value, $sopir->password)) {
                            $fail('Password baru salah !');
                        }
                    },
                ],
                'new_password' => 'required|confirmed',
            ], [
                'old_password.required' => 'Masukkan password lama !',
                'new_password.required' => 'Masukkan password baru !',
                'new_password.confirmed' => 'Konfirmasi password tidak sama !',
            ]);
    
            $sopir = Sopir::find($id_sopir);
            $sopir->nama = $request->input('nama');
            $sopir->email = $request->input('email');
            $sopir->no_hp = $request->input('no_hp');
            $sopir->password = Hash::make($request->new_password);
            $sopir->save();
    
            return redirect()->back()->with('success', 'Data & Password berhasil diubah !');
        }
    }

    public function hapus_sopir_action($id_sopir){

        $sopir = Sopir::find($id_sopir);
        $sopir->delete();
        
        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }

    public function edit_kendaraan() {
        $data['title'] = 'Sopir';

        return view('auth.sopir.edit.edit_kendaraan', $data);
    }

}
