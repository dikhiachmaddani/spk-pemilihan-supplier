<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Matriks;
use App\Models\Normalisasi;
use App\Models\Normalisasi2;
use App\Models\Normalisasi_Terbobot;
use App\Models\Yi;
use App\Models\Result;

class NormalisasiController extends Controller
{
    public function normalisasi()
    {
        $matriks = Matriks::all();
        $c1 = 0;
        $c2 = 0;
        $c3 = 0;
        $c4 = 0;
        $c5 = 0;
        $c6 = 0;
        foreach ($matriks as $data) {
            $c1 += pow($data->kriteria_1, 2);
            $c2 += pow($data->kriteria_2, 2);
            $c3 += pow($data->kriteria_3, 2);
            $c4 += pow($data->kriteria_4, 2);
            $c5 += pow($data->kriteria_5, 2);
            $c6 += pow($data->kriteria_6, 2);
        }

        Normalisasi::create([
            'kode' => 'normalisasi',
            'kriteria_1' => sqrt($c1),
            'kriteria_2' => sqrt($c2),
            'kriteria_3' => sqrt($c3),
            'kriteria_4' => sqrt($c4),
            'kriteria_5' => sqrt($c5),
            'kriteria_6' => sqrt($c6),
        ]);
        return redirect()->route('result.index');
    }

    public function normalisasi2()
    {
        $normalisasi = Normalisasi::first();
        $matriks = Matriks::all();
        foreach ($matriks as $data) {
            Normalisasi2::create([
                'kode' => $data->kode,
                'kriteria_1' => $data->kriteria_1 / $normalisasi->kriteria_1,
                'kriteria_2' => $data->kriteria_2 / $normalisasi->kriteria_2,
                'kriteria_3' => $data->kriteria_3 / $normalisasi->kriteria_3,
                'kriteria_4' => $data->kriteria_4 / $normalisasi->kriteria_4,
                'kriteria_5' => $data->kriteria_5 / $normalisasi->kriteria_5,
                'kriteria_6' => $data->kriteria_6 / $normalisasi->kriteria_6,
            ]);
        }
        return redirect()->route('result.index');
    }

    public function normalisasiTerbobot()
    {
        $matriks = Normalisasi2::all();
        $bobot = Kriteria::all();
        foreach ($matriks as $data) {
            Normalisasi_Terbobot::create([
                'kode' => $data->kode,
                'kriteria_1' => $data->kriteria_1 * $bobot[0]->bobot,
                'kriteria_2' => $data->kriteria_2 * $bobot[1]->bobot,
                'kriteria_3' => $data->kriteria_3 * $bobot[2]->bobot,
                'kriteria_4' => $data->kriteria_4 * $bobot[3]->bobot,
                'kriteria_5' => $data->kriteria_5 * $bobot[4]->bobot,
                'kriteria_6' => $data->kriteria_6 * $bobot[5]->bobot,
            ]);
        }
        return redirect()->route('result.index');
    }

    public function yiMax()
    {
        $defineModel = new Normalisasi_Terbobot();
        $normalisasi_terbobot = $defineModel->all();
        $category = Kriteria::orderBy('kode', 'ASC')->get();
        $getNt = $defineModel->getTableColumns();

        $c = [];

        for ($i = 0; $i < count($category); $i++) {
            $c[$i] = (object) [
                'kriteria' => 'kriteria_' . ($i + 1),
                'tipe' => $category[$i]->tipe
            ];
        }

        $max_values = [];
        $min_values = [];
        $condition_max = true;
        $condition_min = true;

        for ($i = 0; $i < count($c); $i++) {
            if ($c[$i]->kriteria !== $getNt[$i + 2] || $c[$i]->tipe !== 'benefit') {
                $condition_max = false;
                break;
            }
        }

        for ($i = 0; $i < count($c); $i++) {
            if ($c[$i]->kriteria !== $getNt[$i + 2] || $c[$i]->tipe !== 'cost') {
                $condition_min = false;
                break;
            }
        }

        for ($max = 0; $max < count($normalisasi_terbobot); $max++) {
            $max_value = 0;

            if ($condition_max) {
                $max_value = $normalisasi_terbobot[$max]->kriteria_1 +
                    $normalisasi_terbobot[$max]->kriteria_2 +
                    $normalisasi_terbobot[$max]->kriteria_3 +
                    $normalisasi_terbobot[$max]->kriteria_4 +
                    $normalisasi_terbobot[$max]->kriteria_5 +
                    $normalisasi_terbobot[$max]->kriteria_6;
            } else {
                for ($i = 0; $i < count($c); $i++) {
                    if ($c[$i]->kriteria !== $getNt[$i + 2] || $c[$i]->tipe !== 'benefit') {
                        continue;
                    }
                    $max_value += $normalisasi_terbobot[$max]->{"kriteria_" . ($i + 1)};
                }
            }

            $max_values[] = $max_value;
        }

        for ($min = 0; $min < count($normalisasi_terbobot); $min++) {
            $min_value = 0;

            if ($condition_min) {
                $min_value = $normalisasi_terbobot[$min]->kriteria_1 +
                    $normalisasi_terbobot[$min]->kriteria_2 +
                    $normalisasi_terbobot[$min]->kriteria_3 +
                    $normalisasi_terbobot[$min]->kriteria_4 +
                    $normalisasi_terbobot[$min]->kriteria_5 +
                    $normalisasi_terbobot[$min]->kriteria_6;
            } else {
                for ($i = 0; $i < count($c); $i++) {
                    if ($c[$i]->kriteria !== $getNt[$i + 2] || $c[$i]->tipe !== 'cost') {
                        continue;
                    }
                    $min_value += $normalisasi_terbobot[$min]->{"kriteria_" . ($i + 1)};
                }
            }

            $min_values[] = $min_value;
        }

        foreach ($normalisasi_terbobot as $i => $item) {
            Yi::create([
                'kode' => $item->kode,
                'min' => $min_values[$i],
                'max' =>  $max_values[$i],
                'minmax' => $max_values[$i] - $min_values[$i],
            ]);
        }

        return redirect()->route('result.index');
    }

    public function result()
    {
        $yi = Yi::all();
        $supplier = Alternatif::all();
        for ($i = 0; $i < count($yi); $i++) {
            Result::create([
                'kode' => $yi[$i]->kode,
                'supplier' => $supplier[$i]->alternatif,
                'preference_value' => $yi[$i]->minmax,
            ]);
        }

        return redirect()->route('result.index');
    }

    public function destroy()
    {
        Normalisasi::query()->truncate();
        Normalisasi2::query()->truncate();
        Normalisasi_Terbobot::query()->truncate();
        Yi::query()->truncate();
        Result::query()->truncate();
        return redirect()->route('result.index');
    }
}
