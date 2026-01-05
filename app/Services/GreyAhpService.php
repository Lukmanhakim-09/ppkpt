<?php

namespace App\Services;

class GreyAhpService
{
    public function calculateWeights(array $greyMatrix)
    {
        // 1️⃣ ubah interval grey → nilai tengah (crisp)
        $crisp = [];

        foreach ($greyMatrix as $row) {
            $temp = [];
            foreach ($row as $interval) {
                [$l, $u] = $interval;
                $temp[] = ($l + $u) / 2;
            }
            $crisp[] = $temp;
        }

        // ubah ke matriks numerik
        $n = count($crisp);

        // 2️⃣ hitung eigenvector (pendekatan AHP sederhana via rata-rata baris)
        $rowSum = [];
        foreach ($crisp as $row) {
            $rowSum[] = array_sum($row);
        }

        $total = array_sum($rowSum);

        $weights = [];
        foreach ($rowSum as $value) {
            $weights[] = $value / $total;
        }

        return $weights;
    }
}
