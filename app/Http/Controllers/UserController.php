<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Helpers\AesHelper;
use App\Models\Verify;
use App\Mail\OtpMail;
use App\Models\Berita;
use App\Models\Aduan;
use App\Models\Status;
use App\Models\Message;
use App\Models\Investigation;
use App\Services\MARCOSService;
use Illuminate\Validation\ValidationException;
use App\Models\Bobot;
use App\Models\Alternatif;


class UserController extends Controller
{
    
    public function alternatif()
    {
        return $this->hasOne(Alternatif::class, 'aduan_id');
    }


    public function storeAduan(Request $request)
    {
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
        ]);

        try {
            if ($request->hasFile('pernyataan_pelapor')) {
                $validatedData['pernyataan_pelapor'] =
                    $request->file('pernyataan_pelapor')->store('aduan/pernyataan', 'public');
            }

            if ($request->hasFile('bukti_pelaporan')) {
                $validatedData['bukti_pelaporan'] =
                    $request->file('bukti_pelaporan')->store('aduan/bukti', 'public');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal upload file: ' . $e->getMessage());
        }

        $validatedData['user_id'] = Auth::id();
        $validatedData['icon'] = 'fa-solid fa-file-circle-check';

        $fieldsToEncrypt = [
            'nama_pelapor',
            'alamat_pelapor',
            'email_pelapor',
            'phone_pelapor',
            'nama_korban',
            'jenis_kelamin_korban',
            'alamat_korban',
            'phone_korban',
            'status_korban',
            'nama_terlapor',
            'jenis_kelamin_terlapor',
            'alamat_terlapor',
            'phone_terlapor',
            'status_terlapor',
            'karakteristik_terlapor',
            'terlapor',
            'warning',
            'warning_detail',
            'chronology',
            'lokasi'
        ];

        foreach ($fieldsToEncrypt as $field) {
            if (isset($validatedData[$field])) {
                $validatedData[$field] = AesHelper::encrypt($validatedData[$field]);
            }
        }

        $aduan = Aduan::create($validatedData);
        $service = new MARCOSService();

        $nilai = $service->hitungNilaiAlternatif($request);

        Alternatif::create([
            'aduan_id' => $aduan->id,
            'kriteria1' => $nilai['c1'],
            'kriteria2' => $nilai['c2'],
            'kriteria3' => $nilai['c3'],
            'kriteria4' => $nilai['c4'],
            'kriteria5' => $nilai['c5'],
            'kriteria6' => $nilai['c6'],
        ]);

        $aduan->kode_aduan = 'PPKPT' . $aduan->id . date('dy') . rand(10, 99);
        $aduan->save();
        
        $bobot = Bobot::first(); // karena cuma 1 baris

        $w = [
            $bobot->c1,
            $bobot->c2,
            $bobot->c3,
            $bobot->c4,
            $bobot->c5,
            $bobot->c6,
        ];

        $alternatifs = Alternatif::with('aduan')->orderBy('id')->get();

        $L = [];
        $map = [];   // index MARCOS → aduan_id

        foreach ($alternatifs as $i => $alt) {
            $L[] = [
                $alt->kriteria1,
                $alt->kriteria2,
                $alt->kriteria3,
                $alt->kriteria4,
                $alt->kriteria5,
                $alt->kriteria6,
            ];

            $map[$i] = $alt->aduan_id;
        }

        
        $type = [
        'cost',    // C1
        'benefit', // C2
        'benefit', // C3
        'benefit', // C4
        'benefit', // C5
        'benefit', // C6
        ];

            $marcos = new MARCOSService();

        // Tahap 2: AI & AAI (Pers. 2-6)
        [$AI, $AAI] = $marcos->idealAntiIdeal($L, $type);

        // Tahap 3: Normalisasi (2-7, 2-8)
        $N = $marcos->normalisasi($L, $AI, $type);

        // Tahap 4: Normalisasi berbobot (2-9)
        $WN = $marcos->normalisasiBerbobot($N, $w);

        // Tahap 5: Nilai kegunaan
        $S = $marcos->nilaiKegunaan($WN);

        // Tahap 6: Derajat kegunaan (Ci+ & Ci-)
        [$Cplus, $Cminus] = $marcos->derajatKegunaan($S);

        // Tahap 7: Fungsi kegunaan & ranking
        $ranking = $marcos->fungsiKegunaan($Cplus, $Cminus);

        $total = count($ranking);

        $tinggi  = ceil($total * 0.33);
        $menengah = ceil($total * 0.66);

        $i = 1;
        foreach ($ranking as $index => $score) {

            if ($i <= $tinggi) {
                $kategori = 'Tinggi';
            } elseif ($i <= $menengah) {
                $kategori = 'Menengah';
            } else {
                $kategori = 'Rendah';
            }

            $aduanId = $map[$index];

            Aduan::where('id', $aduanId)->update([
                'nilai'     => round($score, 4),
                'peringkat' => $i,
                'prioritas'  => $kategori,
            ]);

            $i++;
        }

        Status::create([
            'aduan_id' => $aduan->id,
            'label1'   => 'Menunggu Verifikasi Admin',
            'status1'  => '[' . now()->format('d/m/Y') . '][' . now()->format('H:i') .
                '] - Laporan Anda berhasil dikirim dan sedang menunggu verifikasi dari admin.'
        ]);

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

    public function hasilinvestigasi($kode_aduan)
    {   
        $aduan = Aduan::where('kode_aduan', $kode_aduan)->first();
        $investigasi = Investigation::where('kode_aduan', $kode_aduan)->first();
        return view('user.hasilinvestigasi', compact('investigasi', 'aduan'));
    }
    
}
