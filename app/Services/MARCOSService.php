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
            'phone_terlapor'
        ];

        $total = count($fields) + 1; // +1 karena ada bukti_pelaporan
        $kosong = 0;

        // cek field teks
        foreach ($fields as $f) {
            if (!$request->filled($f)) {
                $kosong++;
            }
        }

        // cek file upload
        if (!$request->hasFile('bukti_pelaporan')) {
            $kosong++;
        }


        // total field wajib = 4
        if ($kosong == 0) {
            $c1 = 1;      // data sangat lengkap
        } 
        elseif ($kosong == 1) {
            $c1 = 4;      // ada sedikit kekurangan
        } 
        elseif ($kosong == 2) {
            $c1 = 7;      // cukup banyak kosong
        } 
        else { // 3 atau 4
            $c1 = 10;     // sangat tidak lengkap
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

function idealAntiIdeal(array $L, array $type): array
{
    $AI = $AAI = [];
    $n = count($L[0]);

    for ($j = 0; $j < $n; $j++) {
        $col = array_column($L, $j);

        if ($type[$j] === 'benefit') {
            $AI[$j]  = max($col);
            $AAI[$j] = min($col);
        } else {
            $AI[$j]  = min($col);
            $AAI[$j] = max($col);
        }
    }
    return [$AI, $AAI];
}

function normalisasi(array $L, array $AI, array $type): array
{
    $N = [];

    foreach ($L as $i => $row) {
        foreach ($row as $j => $val) {
            if ($type[$j] === 'benefit') {
                $N[$i][$j] = $val / $AI[$j];
            } else {
                $N[$i][$j] = $AI[$j] / $val;
            }
        }
    }
    return $N;
}

function normalisasiBerbobot(array $N, array $w): array
{
    $WN = [];

    foreach ($N as $i => $row) {
        foreach ($row as $j => $val) {
            $WN[$i][$j] = $val * $w[$j];
        }
    }
    return $WN;
}

function nilaiKegunaan(array $WN): array
{
    return array_map('array_sum', $WN);
}

function derajatKegunaan(array $S): array
{
    $S_AI  = max($S);
    $S_AAI = min($S);

    $Cplus = $Cminus = [];

    foreach ($S as $i => $val) {
        $Cplus[$i]  = $val / $S_AI;
        $Cminus[$i] = $val / $S_AAI;
    }
    return [$Cplus, $Cminus];
}

function fungsiKegunaan(array $Cplus, array $Cminus): array
{
    $f = [];

    foreach ($Cplus as $i => $cp) {
        $cm = $Cminus[$i];

        $f[$i] = ($cp + $cm) /
            (1 + ((1 - $cp) / $cp) + ((1 - $cm) / $cm));
    }

    arsort($f); // ranking
    return $f;
}

}
