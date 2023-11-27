<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index($id_admin) {
        $data['title'] = 'Profil';

        $admin = User::find($id_admin);

        return view('auth.profil.profil', [
            'admin' => $admin,
        ], $data);
    }
}
