<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
        return view('home', compact('beritas'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $beritas = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
        return view('berita', compact('berita', 'beritas'));
    }
}
