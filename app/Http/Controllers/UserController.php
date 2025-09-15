<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\Verify;
use App\Mail\OtpMail;
use App\Models\Berita;
use App\Models\Aduan;
use App\Models\Status;
use App\Models\Message;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function storeAduan(Request $request)
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
                'pernyataan_pelapor.max' => 'File Pernyataan tidak boleh lebih dari 2MB',
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
                'bukti_pelaporan.max' => 'File Bukti Pelaporan tidak boleh lebih dari 2MB',
                'lokasi.required' => 'Lokasi wajib diisi.',
            ]);

            try {
                // Simpan file pernyataan
                if ($request->hasFile('pernyataan_pelapor')) {
                    $pernyataanPath = $request->file('pernyataan_pelapor')->store('aduan/pernyataan', 'public');
                    $validatedData['pernyataan_pelapor'] = $pernyataanPath;
                }

                // Simpan file bukti pelaporan
                if ($request->hasFile('bukti_pelaporan')) {
                    $buktiPath = $request->file('bukti_pelaporan')->store('aduan/bukti', 'public');
                    $validatedData['bukti_pelaporan'] = $buktiPath;
                }

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan file: ' . $e->getMessage());
            }
            $userId = Auth::id();
            $validatedData['user_id'] = $userId;

            $validatedData['icon'] = 'fa-solid fa-file-circle-check';

           
            
            // Simpan ke database
            $aduan = Aduan::create($validatedData);
            $aduan->kode_aduan = 'ADUAN-' . str_pad($aduan->id, 4, '0', STR_PAD_LEFT);
            $aduan->save();

            $validatedData1['aduan_id'] = $aduan->id;
            $validatedData1['label1'] = 'Diterima oleh Admin';
            $validatedData1['status1'] = '[12/06/2025][12:00] - Laporan Anda berhasil dikirim dan diterima oleh admin.';
            
            $status = Status::create($validatedData1);

            return redirect()->route('aduan.store')->with('success', 'Aduan berhasil dikirim');
    }    

    public function berita()
    {   
        \Carbon\Carbon::setLocale('id');

        $aduans = Aduan::with('statuses') // ambil aduan + statusnya
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $beritas = Berita::where('status', 'publish')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.home', compact('beritas', 'aduans'));
    }

    private function maskEmail($email)
    {
        $atPos = strpos($email, '@');
        $username = substr($email, 0, $atPos);
        $domain = substr($email, $atPos);

        // Pisahkan: 3 huruf awal + masking + 1 huruf terakhir
        if (strlen($username) > 4) {
            $first1 = substr($username, 0, 1);
            $last2 = substr($username, -2);
            $maskedMiddle = str_repeat('*', strlen($username) - 3);
            $maskedEmail = $first1 . $maskedMiddle . $last2 . $domain;
        } else {
            // Kalau username terlalu pendek (<=4), tampilkan apa adanya
            $maskedEmail = $username . $domain;
        }

        return $maskedEmail;
    }

    // Tampilkan halaman verifikasi (TIDAK mengirim OTP di sini)
    public function verify()
    {
        $user = auth()->user();
        $maskedEmail = $this->maskEmail($user->email);
        return view('user.verify', compact('maskedEmail'));
    }

    public function verifyOtp(Request $request)
    {
        try {
            // Validasi input OTP (harus 4 digit)
            $request->validate([
                'kode' => ['required', 'string', 'size:4']
            ]);

            $user = Auth::user();
            
            if (!$user) {
                return back()->withErrors(['kode' => 'User tidak ditemukan.']);
            }

            $verify = Verify::where('user_id', $user->id)
            ->where('otp', md5($request->kode))
            ->where('expired_at', '>', now())
            ->first();

        if (!$verify) {
            // Cari OTP expired tapi masih sama OTP-nya
            $expiredOtp = Verify::where('user_id', $user->id)
                ->where('otp', md5($request->kode))
                ->where('expired_at', '<=', now())
                ->first();

            if ($expiredOtp) {
                $expiredOtp->delete(); // hapus OTP expired
                return back()->withErrors(['kode' => 'Kode OTP telah kadaluarsa. Silakan minta kode baru.']);
            }

            return back()->withErrors(['kode' => 'Kode OTP tidak valid.']);
        }

            // Tandai akun sudah diverifikasi
            $user->status_verify = '1';
            $user->save();

            // Redirect ke halaman beranda user
            return redirect()->route('user.home')
                ->with('success', 'Email berhasil diverifikasi!');

        } catch (\Exception $e) {
            return back()->withErrors(['kode' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    // Kirim OTP saat user klik "Kirim Ulang"
    public function resendOtp(Request $request)
    {
        $user = auth()->user();
        $otp = rand(1000, 9999);

        // Update existing OTP record (kalau ada)
        $verify = Verify::where('user_id', $user->id)->first();

        if ($verify) {
            // Kalau record sudah ada, update OTP dan expired_at
            $verify->update([
                'otp' => md5($otp),
                'expired_at' => now()->addMinutes(2)
            ]);
        } else {
            // Kalau record belum ada, buat baru
            Verify::create([
                'user_id' => $user->id,
                'otp' => md5($otp),
                'expired_at' => now()->addMinutes(2)
            ]);
        }

        // Send email OTP
        Mail::to($user->email)->send(new OtpMail($otp));

        // Simpan expired timestamp ke session (milidetik)
        session(['otpTargetTime' => now()->addMinutes(2)->timestamp * 1000]);

        return back()->with('success', 'Kode OTP telah dikirim ulang ke email Anda.', ['otpTargetTime' => now()->addMinutes(2)->timestamp * 1000]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'pesan' => 'required',
            ], [
                'nama.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email tidak valid.',
                'pesan.required' => 'Pesan wajib diisi.',
            ]);
    
            Message::create($validatedData);
    
            if (auth()->check()) {
                return redirect()->route('user.home')->with('success', 'Pesan berhasil dikirim!');
            } else {
                return redirect()->route('home')->with('success', 'Pesan berhasil dikirim!');
            }
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator, 'message')
                ->withInput();
        }
    }


}
