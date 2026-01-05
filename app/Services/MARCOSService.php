<?php

namespace App\Services;

use Illuminate\Http\Request;

class MARCOSService
{
    public function hitungNilaiAlternatif(Request $request)
    {
        $fields = [
            'alamat_korban',
            'phone_korban',
            'alamat_terlapor',
            'phone_terlapor',
            'warning_detail',
            'bukti_pelaporan'
        ];


        $total = count($fields);
        $kosong = 0;

        foreach ($fields as $f) {
            if (!$request->filled($f)) {
                $kosong++;
            }
        }

        if ($kosong == 0) {
            $c1 = 1;
        } elseif ($kosong <= 2) {
            $c1 = 4;
        } elseif ($kosong <= 4) {
            $c1 = 7;
        } else {
            $c1 = 10;
        }

        $c2 = max([
            $request->dampak_fisik,
            $request->dampak_psikologis,
            $request->keseriusan,
        ]);

        $c3 = max([
            $request->berpotensi,
            $request->berulang,
        ]);

        $c4 = $request->kinerja;


        $c5 = 3;
        if ($request->hasFile('bukti_pelaporan')) $c5 += 7;

        $c6 = max( [
            $request->hubungan_sosial,
            $request->lingkungan,
        ]);

        return compact('c1','c2','c3','c4','c5','c6');
    }
}
