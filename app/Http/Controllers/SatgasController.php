<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Aduan;
use Illuminate\Http\Request;

class SatgasController extends Controller
{
    public function berita()
    {
        $beritas = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
        $aduans = Aduan::orderBy('tanggal_peristiwa', 'desc')->get();
        return view('satgas.home', compact('beritas', 'aduans'));
    }
}
