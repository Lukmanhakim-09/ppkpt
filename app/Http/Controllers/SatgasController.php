<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Aduan;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SatgasController extends Controller
{
    public function berita()
    {
        $beritas = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
         $aduans = Aduan::whereDoesntHave('statuses', function ($query) {
            $query->whereNotNull('label3')
                  ->where('label3', '!=', '');
        })
        ->orderBy('tanggal_peristiwa', 'desc')
        ->get();
        return view('satgas.home', compact('beritas', 'aduans'));
    }


public function laporanditangani()
{
    $userId = Auth::id();

    $aduans = Aduan::whereHas('statuses', function ($query) use ($userId) {
            $query->where('diterima_oleh', $userId);
        })
        ->with(['statuses' => function ($query) use ($userId) {
            $query->where('diterima_oleh', $userId);
        }])
        ->latest()
        ->get();

    return view('satgas.laporanditangani', compact('aduans'));
}



    public function detaillaporan($id)
    {
        $aduan = Aduan::findOrFail($id);
        
        return view('satgas.detaillaporan', compact('aduan'));
    }

    public function terimaaduan($id)
    {
        $aduan = Aduan::findOrFail($id);

        // Cek apakah sudah ada status untuk aduan ini
        $status = Status::where('aduan_id', $id)->first();

        // Ambil user yang sedang login
        $userId = auth()->id(); // atau Auth::id()

        if ($status) {
            // Update label2 dan status2 jika sudah ada
            $status->update([
                'label3' => 'Investigasi Lapangan',
                'status3' => '[' . now()->format('d/m/Y') . '][' . now()->format('H:i') . '] - Laporan Anda sedang dalam proses investigasi lapangan',
                'diterima_oleh' => $userId
            ]);
        }
        
        return redirect()->route('satgas.laporanditangani')->with('success', 'Aduan berhasil diterima dan sedang dalam proses investigasi lapangan');
    }
}
