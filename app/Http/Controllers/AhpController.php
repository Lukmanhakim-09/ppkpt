<?php

namespace App\Http\Controllers;

use App\Services\GreyAhpService;

class AhpController extends Controller
{
    public function calculate(GreyAhpService $service)
    {
        $greyMatrix = [
            [[1,1], [1,2], [1,2], [2,4], [4,6], [2,4]],
            [[0.5,1], [1,1], [1,2], [2,4], [4,6], [2,4]],
            [[0.5,1], [0.5,1], [1,1], [2,4], [4,6], [2,4]],
            [[0.25,0.5], [0.25,0.5], [0.25,0.5], [1,1], [2,4], [1,2]],
            [[0.17,0.25], [0.17,0.25], [0.17,0.25], [0.25,0.5], [1,1], [2,4]],
            [[0.25,0.5], [0.25,0.5], [0.25,0.5], [0.5,1], [0.25,0.5], [1,1]]
        ];

        $weights = $service->calculateWeights($greyMatrix);

        return view('result', compact('weights'));
    }
}
