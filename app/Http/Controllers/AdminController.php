<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Berita;

class AdminController extends Controller
{
    public function kelolapengguna()
    {
        $users = User::where('username', '!=', 'admin')->orderBy('fullname', 'asc')->get();
        return view('admin.kelolapengguna', compact('users'));
    }

    public function berita()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('admin.home', compact('beritas'));
    }

    public function tambahpengguna()
    {
        return view('admin.tambahpengguna');
    }

    
}
