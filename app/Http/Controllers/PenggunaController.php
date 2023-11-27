<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index() {
        $data['title'] = 'Pengguna';

        $total_pelanggan = Pelanggan::count();
        $total_admin = User::count();
        $total_pengguna = $total_pelanggan + $total_admin;

        $pelanggans = Pelanggan::all();
        $tagihans = Tagihan::where('status_tagihan', 'Belum Bayar')->get();

        $admins = User::where('role', 'Admin')->get();

        return view('auth.pengguna.pengguna', [
            'total_pelanggan' => $total_pelanggan,
            'total_admin' => $total_admin,
            'total_pengguna' => $total_pengguna,
            'pelanggans' => $pelanggans,
            'tagihans' => $tagihans,
            'admins' => $admins,
        ], $data);
    }

    public function tambah_pelanggan_action(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:pelanggan',
            'no_hp' => 'required', 
            'jadwal_bayar' => 'required', 
            'alamat' => 'required', 
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ]);

        $pelanggan = new Pelanggan([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp, 
            'jenis_pembayaran' => $request->jadwal_bayar, 
            'alamat' => $request->alamat, 
            'password' => Hash::make($request->password), 
        ]);
        
        $pelanggan->save();
        
        return redirect()->back()->with('success', 'Data berhasil ditambah !');
    }

    public function edit_pelanggan($id_pelanggan) {
        $data['title'] = 'Edit Pelanggan';

        $pelanggan = Pelanggan::find($id_pelanggan);

        return view('auth.pengguna.edit.edit_pelanggan', [
            'pelanggan' => $pelanggan,
        ], $data);
    }

    public function edit_pelanggan_action($id_pelanggan, Request $request) {
        
        if ($request->old_password == null) {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'no_hp' => 'required|string|max:15',
                'jadwal_bayar' => 'required|string',
                'alamat' => 'required|string',
            ]);
    
            $pelanggan = Pelanggan::find($id_pelanggan);
            $pelanggan->nama = $request->input('nama');
            $pelanggan->email = $request->input('email');
            $pelanggan->no_hp = $request->input('no_hp');
            $pelanggan->jenis_pembayaran = $request->input('jadwal_bayar');
            $pelanggan->alamat = $request->input('alamat');
            $pelanggan->save();
    
            return redirect()->route('pengguna')->with('success', 'Data berhasil diubah !');
        } else {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'no_hp' => 'required|string|max:15',
                'jadwal_bayar' => 'required|string',
                'alamat' => 'required|string',
                'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($id_pelanggan) {
                        $pelanggan = Pelanggan::find($id_pelanggan);
            
                        if (!Hash::check($value, $pelanggan->password)) {
                            $fail('Password lama salah !');
                        }
                    },
                ],
                'new_password' => 'required|confirmed',
            ], [
                'old_password.required' => 'Masukkan password lama !',
                'new_password.required' => 'Masukkan password baru !',
                'new_password.confirmed' => 'Konfirmasi password tidak sama !',
            ]);
    
            $pelanggan = Pelanggan::find($id_pelanggan);
            $pelanggan->nama = $request->input('nama');
            $pelanggan->email = $request->input('email');
            $pelanggan->no_hp = $request->input('no_hp');
            $pelanggan->jenis_pembayaran = $request->input('jadwal_bayar');
            $pelanggan->alamat = $request->input('alamat');
            $pelanggan->password = Hash::make($request->new_password);
            $pelanggan->save();
    
            return redirect()->route('pengguna')->with('success', 'Data berhasil diubah !');
        }
    }

    public function hapus_pelanggan_action($id_pelanggan){

        $pelanggan = Pelanggan::find($id_pelanggan);
        $pelanggan->delete();
        
        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }

    public function tambah_admin_action(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:admin',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ]);

        $admin = new User([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => 'Admin', 
            'password' => Hash::make($request->password), 
        ]);
        
        $admin->save();
        
        return redirect()->back()->with('success', 'Data berhasil ditambah !');
    }

    public function edit_admin($id_admin) {
        $data['title'] = 'Edit Admin';

        $admin = User::find($id_admin);

        return view('auth.pengguna.edit.edit_admin', [
            'admin' => $admin,
        ], $data);
    }

    public function edit_admin_action($id_admin, Request $request) {
        
        if ($request->old_password == null) {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);
    
            $admin = User::find($id_admin);
            $admin->nama = $request->input('nama');
            $admin->email = $request->input('email');
            $admin->save();
    
            return redirect()->route('pengguna')->with('success', 'Data berhasil diubah !');
        } else {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($id_admin) {
                        $admin = User::find($id_admin);
            
                        if (!Hash::check($value, $admin->password)) {
                            $fail('Password lama salah !');
                        }
                    },
                ],
                'new_password' => 'required|confirmed',
            ], [
                'old_password.required' => 'Masukkan password lama !',
                'new_password.required' => 'Masukkan password baru !',
                'new_password.confirmed' => 'Konfirmasi password tidak sama !',
            ]);
    
            $admin = User::find($id_admin);
            $admin->nama = $request->input('nama');
            $admin->email = $request->input('email');
            $admin->password = Hash::make($request->new_password);
            $admin->save();
    
            return redirect()->route('pengguna')->with('success', 'Data berhasil diubah !');
        }
    }

    public function hapus_admin_action($id_admin){

        $admin = User::find($id_admin);
        $admin->delete();
        
        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
