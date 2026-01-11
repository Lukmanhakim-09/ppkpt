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
        [1,   7,   5,   9,   1,   7],
        // C2
        [1/7, 1,   9,   9,   5,   1],
        // C3
        [1/5, 1/9, 1,   7,   5,   1],
        // C4
        [1/9, 1/9, 1/7, 1,   1,   1],
        // C5
        [1,   1/5, 1/5, 1,   1,   1],
        // C6
        [1/7, 1,   1,   1,   1,   1],
    ];


    $judgements = [[
        // C1
        [[1,2],[6,8],[4,6],[8,10],[1,2],[6,8]],

        // C2
        [[1/8,1/6],[1,2],[8,10],[8,10],[4,6],[1,2]],

        // C3
        [[1/6,1/4],[1/10,1/8],[1,2],[6,8],[4,6],[1,2]],

        // C4
        [[1/10,1/8],[1/10,1/8],[1/8,1/6],[1,2],[1,2],[1,2]],

        // C5
        [[1,2],[1/6,1/4],[1/6,1/4],[1,2],[1,2],[1,2]],

        // C6
        [[1/8,1/6],[1,2],[1,2],[1,2],[1,2],[1,2]],
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
