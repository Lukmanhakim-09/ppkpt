<?php

namespace App\Services;

class GreyAHPService
{
    /* ===============================
     * 1. AGREGASI GEOMETRIC MEAN
     * =============================== */
    public function aggregate(array $judgements): array
    {
        $H = count($judgements);
        $n = count($judgements[0]);
        $result = [];

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $l = 1;
                $u = 1;
                for ($h = 0; $h < $H; $h++) {
                    $l *= $judgements[$h][$i][$j][0];
                    $u *= $judgements[$h][$i][$j][1];
                }
                $result[$i][$j] = [
                    pow($l, 1 / $H),
                    pow($u, 1 / $H)
                ];
            }
        }
        return $result;
    }

    /* ===============================
     * 2. DEFUZZIFIKASI
     * =============================== */
    public function defuzzify(array $greyMatrix): array
    {
        $crisp = [];
        foreach ($greyMatrix as $i => $row) {
            foreach ($row as $j => $interval) {
                [$l, $u] = $interval;
                $crisp[$i][$j] = ($l + $u) / 2;
            }
        }
        return $crisp;
    }

    /* ===============================
     * 3. HITUNG EIGENVECTOR
     * =============================== */
    public function eigenvector(array $matrix, int $iter = 1000): array
    {
        $n = count($matrix);
        $w = array_fill(0, $n, 1 / $n);

        for ($k = 0; $k < $iter; $k++) {
            $new = array_fill(0, $n, 0);
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    $new[$i] += $matrix[$i][$j] * $w[$j];
                }
            }
            $sum = array_sum($new);
            for ($i = 0; $i < $n; $i++) {
                $new[$i] /= $sum;
            }
            $w = $new;
        }
        return $w;
    }

    /* ===============================
     * 4. LAMBDA MAX
     * =============================== */
    public function lambdaMax(array $matrix, array $weights): float
    {
        $n = count($matrix);
        $lambda = 0;

        for ($i = 0; $i < $n; $i++) {
            $sum = 0;
            for ($j = 0; $j < $n; $j++) {
                $sum += $matrix[$i][$j] * $weights[$j];
            }
            $lambda += $sum / $weights[$i];
        }
        return $lambda / $n;
    }

    /* ===============================
     * 5. CI & CR
     * =============================== */
    public function consistency(float $lambdaMax, int $n): array
    {
        $RI = [
            3 => 0.5245, 4 => 0.8815, 5 => 1.1086,
            6 => 1.2479, 7 => 1.3417, 8 => 1.4056,
            9 => 1.4499, 10 => 1.4854, 11 => 1.5141,
            12 => 1.5365, 13 => 1.5551, 14 => 1.5713,
            15 => 1.5838
        ];

        $CI = ($lambdaMax - $n) / ($n - 1);
        $CR = $CI / ($RI[$n] ?? 1);

        return compact('CI', 'CR');
    }

    /* ===============================
     * 6. PIPELINE GREY AHP
     * =============================== */
    public function process(array $judgements, array $crispAHP): array
    {
        // 1. Hitung CR dari matriks AHP crisp
        $weights_crisp = $this->eigenvector($crispAHP);
        $lambda = $this->lambdaMax($crispAHP, $weights_crisp);
        $consistency = $this->consistency($lambda, count($weights_crisp));

        // 2. Proses Grey tetap dijalankan (walaupun CR ≥ 0.1)
        $grey = $this->aggregate($judgements);
        $crispGrey = $this->defuzzify($grey);
        $weights = $this->eigenvector($crispGrey);

        return [
            'weights' => $weights,
            'lambda_max' => $lambda,
            'CI' => $consistency['CI'],
            'CR' => $consistency['CR'],
        ];
    }


}
