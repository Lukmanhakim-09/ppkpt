<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Aduan;
use App\Models\Status;
use App\Models\Investigation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Helpers\AesHelper;



class SatgasController extends Controller
{
    public function home()
    {
        return view('satgas.home');
    }
    
    public function berita()
    {
        $beritas = Berita::where('status', 'publish')
            ->orderBy('tanggal', 'desc')
            ->get();


        return view('satgas.berita', compact('beritas'));
    }

    public function beritaDetail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('satgas.selengkapnya', compact('berita'));
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
        $aduan = Aduan::where('kode_aduan', $id)->firstOrFail();
        $key = 'PPKPTith';
        $aduan->lokasi = AesHelper::decrypt($aduan->lokasi, $key);
        $aduan->nama_pelapor = AesHelper::decrypt($aduan->nama_pelapor, $key);
        $aduan->alamat_pelapor = AesHelper::decrypt($aduan->alamat_pelapor, $key);
        $aduan->email_pelapor = AesHelper::decrypt($aduan->email_pelapor, $key);
        $aduan->phone_pelapor = AesHelper::decrypt($aduan->phone_pelapor, $key);
        $aduan->nama_korban = AesHelper::decrypt($aduan->nama_korban, $key);
        $aduan->alamat_korban = AesHelper::decrypt($aduan->alamat_korban, $key);
        $aduan->phone_korban = AesHelper::decrypt($aduan->phone_korban, $key);
        $aduan->status_korban = AesHelper::decrypt($aduan->status_korban, $key);
        $aduan->jenis_kelamin_korban = AesHelper::decrypt($aduan->jenis_kelamin_korban, $key);
        $aduan->nama_terlapor = AesHelper::decrypt($aduan->nama_terlapor, $key);
        $aduan->alamat_terlapor = AesHelper::decrypt($aduan->alamat_terlapor, $key);
        $aduan->phone_terlapor = AesHelper::decrypt($aduan->phone_terlapor, $key);
        $aduan->status_terlapor = AesHelper::decrypt($aduan->status_terlapor, $key);
        $aduan->karakteristik_terlapor = AesHelper::decrypt($aduan->karakteristik_terlapor, $key);
        $aduan->jenis_kelamin_terlapor = AesHelper::decrypt($aduan->jenis_kelamin_terlapor, $key);
        $aduan->chronology = AesHelper::decrypt($aduan->chronology, $key);
        $aduan->warning = AesHelper::decrypt($aduan->warning, $key);
        $aduan->warning_detail = AesHelper::decrypt($aduan->warning_detail, $key);
        $aduan->bersedia = AesHelper::decrypt($aduan->bersedia, $key);

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

    public function investigasi($id)
    {
        $aduan = Aduan::findOrFail($id);
        $investigasi = Investigation::where('kode_aduan', $aduan->kode_aduan)->first();

        $key = 'PPKPTith';
        $aduan->lokasi = AesHelper::decrypt($aduan->lokasi, $key);
        $aduan->nama_korban = AesHelper::decrypt($aduan->nama_korban, $key);
        $aduan->status_korban = AesHelper::decrypt($aduan->status_korban, $key);
        $aduan->nama_terlapor = AesHelper::decrypt($aduan->nama_terlapor, $key);
        $aduan->status_terlapor = AesHelper::decrypt($aduan->status_terlapor, $key);
        return view('satgas.investigasi', compact('aduan', 'investigasi'));
    }

    public function investigasiStore(Request $request, $id)
    {
        // Ambil status dari tombol submit
        $status = $request->status_investigasi; // draft | publish

        // Validasi dasar
        $rules = [
            'tanggal' => 'required|date',
            'jenis_kekerasan' => 'required',
            'lokasi_kejadian' => 'required',
            'nama_korban' => 'required',
            'status_korban' => 'required',
            'nama_terlapor' => 'required',
            'status_terlapor' => 'required',

            // opsional umum
            'nama_saksi' => 'nullable',
            'keterangan_saksi' => 'nullable',
            'catatan_proses' => 'nullable',
            'catatan_tindak_lanjut' => 'nullable',
            'wawancara_korban' => 'nullable',
            'wawancara_saksi' => 'nullable',
            'wawancara_terlapor' => 'nullable',
            'fakta_terbukti' => 'nullable',
            'fakta_tidak_terbukti' => 'nullable',
            'file_terbukti' => 'nullable|file',
        ];

        // Validasi kondisional
        if ($status === 'publish') {
            $rules += [
                'proses' => 'required|array',
                'kronologi' => 'required',
                'tindak_lanjut' => 'required|array',
                'hasil_akhir' => 'required',
                'kesimpulan' => 'required',
            ];
        } else {
            $rules += [
                'proses' => 'nullable|array',
                'kronologi' => 'nullable',
                'tindak_lanjut' => 'nullable|array',
                'hasil_akhir' => 'nullable',
                'kesimpulan' => 'nullable',
            ];
        }

        $data = $request->validate($rules);

        // Ambil aduan
        $aduan = Aduan::findOrFail($id);

        // Data tambahan sistem
        $data['kode_aduan'] = $aduan->kode_aduan;
        $data['status_investigasi'] = $status;
        $data['tanggal'] = Carbon::parse($request->tanggal)->format('Y-m-d');

        // Checkbox → JSON
        $data['proses'] = $request->proses ? json_encode($request->proses) : null;
        $data['tindak_lanjut'] = $request->tindak_lanjut ? json_encode($request->tindak_lanjut) : null;

        // Upload file
        if ($request->hasFile('file_terbukti')) {
            $data['file_terbukti'] = $request->file('file_terbukti')
                ->store('bukti', 'public');
        }

        

        // Pastikan aduan_id ada di data
        $data['aduan_id'] = $aduan->id;

        // 🔥 CREATE atau UPDATE
        Investigation::updateOrCreate(
            [
                'aduan_id' => $aduan->id,
                'kode_aduan' => $aduan->kode_aduan
            ], // kunci pencarian
            $data
        );

        $urlDetail = route('user.hasilinvestigasi', $aduan->kode_aduan);

        if ($status === 'publish') {

            $statusText =
                '[' . now()->format('d/m/Y') . '][' . now()->format('H:i') . '] - '
                . 'Investigasi telah selesai dan laporan dinyatakan '
                . ucwords(str_replace('_', ' ', $request->hasil_akhir)) . '.'
                . '<br> Lampiran: '
                . '<a class="text-[#3B6BA2] font-semibold" href="' . $urlDetail . '">'
                . 'Lihat Detail</a>';

            Status::updateOrCreate(
                ['aduan_id' => $aduan->id],
                [
                    'label4'  => 'Laporan Selesai',
                    'status4' => $statusText,
                ]
            );
        }

        return redirect()
            ->route('satgas.laporanditangani')
            ->with(
                'success',
                $status === 'publish'
                    ? 'Investigasi berhasil dipublikasikan'
                    : 'Draft investigasi berhasil disimpan'
            );
    }

    public function detailinvestigasi($kode_aduan)
    {
        $investigasi = Investigation::where('kode_aduan', $kode_aduan)->first();
        $aduan = Aduan::where('kode_aduan', $kode_aduan)->first();

        
        return view('satgas.detailinvestigasi', compact('investigasi', 'aduan'));
    }

    public function laporanselesai()
    {
        // Ambil aduan yang status terakhirnya 'Laporan Selesai'
        $aduans = Aduan::whereHas('statuses', function($query) {
            $query->where(function($q) {
                $q->where('label4', 'Laporan Selesai');
            });
        })->orderBy('tanggal_peristiwa', 'desc')->get();

        return view('satgas.laporanselesai', compact('aduans'));
    }

    public function laporanmasuk()
    {
        $aduans = Aduan::whereHas('statuses', function ($query) {
            $query->where('label2', 'Diteruskan Ke Satgas')
                  ->where(function ($q) {
                      $q->whereNull('label3')
                        ->orWhere('label3', '');
                  });
        })
        ->orderBy('peringkat', 'asc')
        ->get();

        $key = 'PPKPTith';
        foreach ($aduans as $aduan) {
            $aduan->chronology = AesHelper::decrypt($aduan->chronology, $key);
        }

        return view('satgas.laporanmasuk', compact('aduans'));
    }

  
}
