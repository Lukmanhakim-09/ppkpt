<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aduan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'alamat_pelapor' => 'required|string|max:255',
            'pernyataan_pelapor' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'email_pelapor' => 'required|email|max:255',
            'phone_pelapor' => 'required|string|max:20',
            'hubungi' => 'required|string|max:20',
            'nama_korban' => 'required|string|max:255',
            'jenis_kelamin_korban' => 'required|string|max:20',
            'alamat_korban' => 'nullable|string|max:255',
            'phone_korban' => 'nullable|string|max:20',
            'status_korban' => 'required|string|max:20',
            'nama_terlapor' => 'required|string|max:255',
            'jenis_kelamin_terlapor' => 'required|string|max:20',
            'alamat_terlapor' => 'nullable|string|max:255',
            'phone_terlapor' => 'nullable|string|max:20',
            'status_terlapor' => 'required|string|max:20',
            'karakteristik_terlapor' => 'required|string|max:255',
            'terlapor' => 'required|string|max:20',
            'warning' => 'required|string|max:20',
            'warning_detail' => 'nullable|string|max:255',
            'tanggal_peristiwa' => 'required|date',
            'category' => 'required|string|max:255',
            'chronology' => 'required|string',
            'bukti_pelaporan' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'lokasi' => 'required|string|max:255',
        ], [
            'nama_pelapor.required' => 'Nama Pelapor wajib diisi.',
            'alamat_pelapor.required' => 'Alamat wajib diisi.',
            'pernyataan_pelapor.required'=> 'File Pernyataan wajib diisi',
            'email_pelapor.required' => 'Email wajib diisi.',
            'phone_pelapor.required' => 'No Hp wajib diisi.',
            'hubungi.required' => 'Harap pilih salah satu metode kontak.',
            'nama_korban.required' => 'Nama Korban wajib diisi.',
            'jenis_kelamin_korban.required' => 'Jenis Kelamin Korban wajib diisi.',
            
            
            'status_korban.required' => 'Status Korban wajib diisi.',
            'nama_terlapor.required' => 'Nama Terlapor wajib diisi.',
            'jenis_kelamin_terlapor.required' => 'Jenis Kelamin Terlapor wajib diisi.',
            
            
            'status_terlapor.required' => 'Status Terlapor wajib diisi.',
            'karakteristik_terlapor.required' => 'Karakteristik Terlapor wajib diisi.',
            'terlapor.required' => 'Harap pilih salah satu opsi.',
            'warning.required' => 'Harap pilih salah satu opsi.',
            'warning_detail.required_if' => 'Harap jelaskan tindakan atau peringatan sebelumnya.',
            'tanggal_peristiwa.required' => 'Tanggal Peristiwa wajib diisi.',
            'category.required' => 'Kategori wajib diisi.',
            'chronology.required' => 'Kronologi wajib diisi.',
            'lokasi.required' => 'Lokasi wajib diisi.',
        ]);

        // Simpan file
        $validatedData['pernyataan_pelapor'] = $request->file('pernyataan_pelapor')->store('public/pernyataan_pelapor');

        // Kalau ada file bukti pelaporan (opsional)
        if ($request->hasFile('bukti_pelaporan')) {
            $validatedData['bukti_pelaporan'] = $request->file('bukti_pelaporan')->store('public/bukti_pelaporan');
        }
        $userId = Auth::id();
        $validatedData['user_id'] = $userId;
        
        // Simpan ke database
        Aduan::create($validatedData);

        return redirect()->route('aduan.store');
   }    
}
