<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Services\GreyAHPService;

class AhpController extends Controller
{
public function calculate()
{
    $crispAHP = [
        // C1
        [1,   7,   5,   5,   9,   3],
        // C2
        [1/7, 1,   1/3,   1/5,   3,   1/5],
        // C3
        [1/5, 3, 1,   1/3,   5,   1/3],
        // C4
        [1/5, 5, 3, 1,   5,   1/3],
        // C5
        [1/9,   1/3, 1/5, 1/5,   1,   1/7],
        // C6
        [1/3, 5,   3,   3,   7,   1],
    ];

    $crispAHP1 = [

    // C1 – Tingkat Ketidaklengkapan Data Laporan
    [1, 5, 5, 7, 3, 9],

    // C2 – Tingkat Keparahan Kekerasan
    [1/5, 1, 3, 5, 1/3, 5],

    // C3 – Risiko Ancaman Berulang
    [1/5, 1/3, 1, 3, 1/5, 5],

    // C4 – Kerentanan Korban
    [1/7, 1/5, 1/3, 1, 1/5, 3],

    // C5 – Bukti Pendukung
    [1/3, 3, 5, 5, 1, 7],

    // C6 – Dampak Sosial / Publik
    [1/9, 1/5, 1/5, 1/3, 1/7, 1],

    ];


    $judgements = [[
        // C1
        [[1,2],[6,8],[4,6],[4,6],[8,10],[2,4]],

        // C2
        [[1/8,1/6],[1,2],[1/4,1/2],[1/6,1/4],[2,4],[1/6,1/4]],

        // C3
        [[1/6,1/4],[2,4],[1,2],[1/4,1/2],[4,6],[1/4,1/2]],

        // C4
        [[1/6,1/4],[4,6],[2,4],[1,2],[4,6],[1/4,1/2]],

        // C5
        [[1/10,1/8],[1/4,1/2],[1/6,1/4],[1/6,1/4],[1,2],[1/8,1/6]],

        // C6
        [[1/4,1/2],[4,6],[2,4],[2,4],[6,8],[1,2]],
    ], [

    // C1
    [[1,2], [4,6], [4,6], [6,8], [2,4], [8,10]],

    // C2
    [[1/6,1/4], [1,2], [2,4], [4,6], [1/4,1/2], [4,6]],

    // C3
    [[1/6,1/4], [1/4,1/2], [1,2], [2,4], [1/6,1/4], [4,6]],

    // C4
    [[1/8,1/6], [1/6,1/4], [1/4,1/2], [1,2], [1/6,1/4], [2,4]],

    // C5
    [[1/4,1/2], [2,4], [4,6], [4,6], [1,2], [6,8]],

    // C6
    [[1/10,1/8], [1/6,1/4], [1/6,1/4], [1/4,1/2], [1/8,1/6], [1,2]],

]];


    $service = new \App\Services\GreyAHPService();
    $result = $service->process($crispAHP);
    $result1 = $service->process($crispAHP1);
    $bobot = $service->processGrey($judgements);

    // Simpan bobot meskipun CR ≥ 0.1
    Bobot::updateOrCreate(['id'=>1], [
        'c1'=>$bobot['weights'][0],
        'c2'=>$bobot['weights'][1],
        'c3'=>$bobot['weights'][2],
        'c4'=>$bobot['weights'][3],
        'c5'=>$bobot['weights'][4],
        'c6'=>$bobot['weights'][5],
    ]);

    return view('result', [
        'weights' => [
            'C1'=>$bobot['weights'][0],
            'C2'=>$bobot['weights'][1],
            'C3'=>$bobot['weights'][2],
            'C4'=>$bobot['weights'][3],
            'C5'=>$bobot['weights'][4],
            'C6'=>$bobot['weights'][5],
        ],
        'CR' => $result['CR'],
        'CI' => $result['CI'],
        'lambda_max' => $result['lambda_max'],

        'CR2' => $result1['CR'],
        'CI2' => $result1['CI'],
        'lambda_max' => $result1['lambda_max'],
    ]);
}

}
