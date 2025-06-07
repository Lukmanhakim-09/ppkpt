<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Berita;
use App\Models\Document;

class AdminController extends Controller
{
    public function berita()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('admin.home', compact('beritas'));
    }

    public function keloladokumen()
    {       
        $documents = Document::orderBy('id', 'asc')->get();
        return view('admin.dokumen.keloladokumen', compact('documents'));
    }

    public function showTambahDokumenForm()
    {
        return view('admin.dokumen.tambahdokumen');
    }

    public function storeDokumen(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'file.required' => 'File wajib diisi',
            'file.max' => 'File tidak boleh lebih dari 2MB',
        ]);

        try {
            if ($request->hasFile('file')) {
                $filedokumen = $request->file('file')->store('dokumen', 'public');
                $fileName = $filedokumen;
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan file: ' . $e->getMessage());
        }

        Document::create([
            'judul' => $request->judul,
            'file' => $fileName,
        ]);

        return redirect()->route('admin.keloladokumen')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function showEditDokumenForm($id)
    {
        $document = Document::findOrFail($id);
        return view('admin.dokumen.editdokumen', compact('document'));
    }

    public function updateDokumen(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'file.max' => 'File tidak boleh lebih dari 2MB',
        ]);

        try {
            if ($request->hasFile('file')) {
                $filedokumen = $request->file('file')->store('dokumen', 'public');
                $fileName = $filedokumen;
            } else {
                $fileName = $document->file;
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan file: ' . $e->getMessage());
        }

        $document->update([
            'judul' => $request->judul,
            'file' => $fileName,
        ]);

        return redirect()->route('admin.keloladokumen')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function kelolapengguna()
    {
        $users = User::orderBy('fullname', 'asc')->get();
        return view('admin.pengguna.kelolapengguna', compact('users'));
    }

    public function showTambahPenggunaForm()    
    {
        return view('admin.pengguna.tambahpengguna');
    }

    public function storePengguna(Request $request)
    {
        // Validasi awal
        $rules = [
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
        ];

        // Email hanya wajib jika bukan admin
        if ($request->role !== 'admin' && $request->role !== 'satgas') {
            $rules['email'] = 'required|email|unique:users';
            $rules['nim_nidn'] = 'required';
            $rules['status'] = 'required';
        } else {
            // Email opsional untuk admin dan satgas
            $rules['email'] = 'nullable|email|unique:users';
            $rules['nim_nidn'] = 'nullable';
            $rules['status'] = 'nullable';
        }

        $request->validate($rules, [
            'fullname.required' => 'Nama Lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak cocok',
            'role.required' => 'Pilih salah satu role',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'nim_nidn.required' => 'NIM/NIDN wajib diisi',
            'status.required' => 'Pilih salah satu status',
        ]);

        // Siapkan data
        $data = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password, 
            'role' => $request->role,
            'profile' => 'img/user.webp',
        ];

        if ($request->role === 'admin' && $request->role === 'satgas') {
            $data['status_verify'] = null;
            $data['nim_nidn'] = null;
            $data['status'] = null;
        } else {
            $data['status_verify'] = '0';
            $data['nim_nidn'] = $request->nim_nidn;
            $data['status'] = $request->status;
        }

        User::create($data);

        // Kembalikan response (misalnya redirect atau json)
        return redirect()->route('admin.kelolapengguna')->with('success', 'Pengguna berhasil ditambahkan.');
}


    
}
