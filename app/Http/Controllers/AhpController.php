<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Services\GreyAHPService;

class AhpController extends Controller
{
public function calculate()
{
    $crispAHP = [[
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
    ],
     [

    // C1 – Tingkat Ketidaklengkapan Data Laporan
    [1, 5, 5, 7, 3, 9],

    // C2 – Tingkat Keparahan Kekerasan
    [1/5, 1, 3, 5, 1/3, 5],

    // C3 – Risiko Ancaman Berulang
    [1/5, 1/3, 1, 3, 1/5, 5],

    // C4 – Kerentanan Korban
    [1/7, 1/5, 1/3, 1, 1/7, 3],

    // C5 – Bukti Pendukung
    [1/3, 3, 5, 5, 1, 9],

    // C6 – Dampak Sosial / Publik
    [1/9, 1/7, 1/5, 1/3, 1/9, 1],

]
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
    $result = $service->process($judgements, $crispAHP);

    // Simpan bobot meskipun CR ≥ 0.1
    Bobot::updateOrCreate(['id'=>1], [
        'c1'=>$result['weights'][0],
        'c2'=>$result['weights'][1],
        'c3'=>$result['weights'][2],
        'c4'=>$result['weights'][3],
        'c5'=>$result['weights'][4],
        'c6'=>$result['weights'][5],
    ]);

    return view('result', [
        'weights' => [
            'C1'=>$result['weights'][0],
            'C2'=>$result['weights'][1],
            'C3'=>$result['weights'][2],
            'C4'=>$result['weights'][3],
            'C5'=>$result['weights'][4],
            'C6'=>$result['weights'][5],
        ],
        'CR' => $result['CR'],
        'CI' => $result['CI'],
        'lambda_max' => $result['lambda_max'],
    ]);
}

}
