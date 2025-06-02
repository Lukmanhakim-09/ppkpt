<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function indexhome()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('home', compact('beritas'));
    }
    public function indexuser() 
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('user.home', compact('beritas'));
    }

    public function indexadmin()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('admin.home', compact('beritas'));
    }
}
