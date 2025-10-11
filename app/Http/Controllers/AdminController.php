<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Berita;
use App\Models\Aduan;
use App\Models\Document;
use App\Models\Message;
use App\Models\Status;

class AdminController extends Controller
{
    public function berita()
    {
        $beritas = Berita::where('status', 'publish')->orderBy('tanggal', 'desc')->get();
        $messages = Message::orderBy('id', 'desc')->get();
        return view('admin.home', compact('beritas', 'messages'));
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

    public function deleteDokumen($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->route('admin.keloladokumen')->with('success', 'Dokumen berhasil dihapus.');
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

    public function showEditPenggunaForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.editpengguna', compact('user'));
    }   

    public function updatePengguna(Request $request, $id) {
        $user = User::findOrFail($id);

        $rules = [
            'fullname' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'password' => 'nullable|confirmed',
        ];

        // Email hanya wajib jika bukan admin
        if ($user->role !== 'admin' && $user->role !== 'satgas') {
            $rules['email'] = 'required|email|unique:users,email,' . $user->id;
            $rules['nim_nidn'] = 'required';
            $rules['status'] = 'required';
        } else {
            // Email opsional untuk admin dan satgas
            $rules['email'] = 'nullable|email|unique:users,email,' . $user->id;
            $rules['nim_nidn'] = 'nullable';
            $rules['status'] = 'nullable';
        }


        $request->validate($rules, [
            'fullname.required' => 'Nama Lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.confirmed' => 'Password tidak cocok',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'nim_nidn.required' => 'NIM/NIDN wajib diisi',
            'status.required' => 'Pilih salah satu status',
        ]);

        $data = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'nim_nidn' => $request->nim_nidn,
            'status' => $request->status,
        ];

        if ($request->password) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()->route('admin.kelolapengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function deletePengguna($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.kelolapengguna')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function kelolaberita()
    {
        $beritas = Berita::orderBy('judul', 'desc')->get();
        return view('admin.berita.kelolaberita', compact('beritas'));
    }
    
    public function showTambahBeritaForm()
    {   
        return view('admin.berita.tambahberita');
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:80',
            'deskripsi' => [
            'required',
            function ($attribute, $value, $fail) {
                if (trim(strip_tags($value)) === '') {
                    $fail('Deskripsi wajib diisi.');
                }
            },

        ],
            'tanggal' => 'required',
            'penulis' => 'required',
            'gambar' => 'required|file|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'judul.max' => 'Judul tidak boleh lebih dari 80 karakter',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'penulis.required' => 'Penulis wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                $fileberita = $request->file('gambar')->store('berita','public');
                $fileName = $fileberita;
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan file: ' . $e->getMessage());
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'gambar' => $fileName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.kelolaberita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function showEditBeritaForm($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.editberita', compact('berita'));
    }

    public function updateBerita(Request $request, $id) {
        $berita = Berita::findOrFail($id);
        $rules = [
            'judul' => 'required|string|max:80',
            'deskripsi' => [
            'required',
            function ($attribute, $value, $fail) {
                if (trim(strip_tags($value)) === '') {
                    $fail('Deskripsi wajib diisi.');
                }
            },

        ],
            'tanggal' => 'required',
            'penulis' => 'required',
            'gambar' => 'nullable|file|max:2048',
        ];

        $request->validate($rules, [
            'judul.required' => 'Judul wajib diisi',
            'judul.max' => 'Judul tidak boleh lebih dari 80 karakter',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'penulis.required' => 'Penulis wajib diisi',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                $fileberita = $request->file('gambar')->store('berita','public');
                $fileName = $fileberita;
            } else {
                $fileName = $berita->gambar;
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan file: ' . $e->getMessage());
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'gambar' => $fileName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.kelolaberita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function deleteBerita($id) {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.kelolaberita')->with('success', 'Berita berhasil dihapus.');
    }       

    public function kelolaformulir()
    {
        // Hanya tampilkan aduan yang belum dikirim ke satgas (belum ada status dengan label2)
        $aduans = Aduan::orderBy('created_at', 'desc')
            ->whereDoesntHave('statuses', function($query) {
                $query->whereNotNull('label2');
            })
            ->get();
        return view('admin.kelolaformulir', compact('aduans'));
    }

    public function kirimKeSatgas($id)
    {
        $aduan = Aduan::findOrFail($id);
        
        // Cek apakah sudah ada status untuk aduan ini
        $status = Status::where('aduan_id', $id)->first();
        
        if ($status) {
            // Update label2 dan status2 jika sudah ada
            $status->update([
                'label2' => 'Diteruskan Ke Satgas',
                'status2' => 'Laporan Anda Telah Diverifikasi Admin dan Diteruskan Kepada Satgas untuk Ditindaklanjuti'
            ]);
        } 
        
        return redirect()->route('admin.kelolaformulir')->with('success', 'Aduan berhasil dikirim ke Satgas.');
    }
}
