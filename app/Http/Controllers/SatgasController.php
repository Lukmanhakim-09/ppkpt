<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Aduan;
use App\Models\Status;
use App\Models\Investigation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;



class SatgasController extends Controller
{
    public function berita()
    {
        $beritas = Berita::where('status', 'publish')
            ->orderBy('tanggal', 'desc')
            ->get();

        $aduans = Aduan::whereDoesntHave('statuses', function ($query) {
            $query->where(function ($q) {
                // label3 ada isinya
                $q->whereNotNull('label3')
                ->where('label3', '!=', '');
            })->orWhere(function ($q) {
                // label2 = 'Laporan Dikembalikan'
                $q->where('label2', 'Laporan Dikembalikan');
            });
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

    public function investigasi($id)
    {
        $aduan = Aduan::findOrFail($id);
        $investigasi = Investigation::where('kode_aduan', $aduan->kode_aduan)->first();
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

        

        // 🔥 CREATE atau UPDATE
        Investigation::updateOrCreate(
            ['kode_aduan' => $aduan->kode_aduan], // kunci pencarian
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




}
