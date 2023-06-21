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
        for ($i = 0; $i < count($category); $i++) {
            ${"c" . ($i + 1)} = (object)[
                'kriteria' => 'kriteria_' . ($i + 1),
                'tipe' => $category[$i]->tipe
            ];
        }
        if ($c1->kriteria == $getNt[2] && $c1->tipe == 'benefit') {
            for ($min = 0; $min < count($normalisasi_terbobot); $min++) {
                ${"min$min"} = $normalisasi_terbobot[$min]->kriteria_1 +
                    $normalisasi_terbobot[$min]->kriteria_2 +
                    $normalisasi_terbobot[$min]->kriteria_3 +
                    $normalisasi_terbobot[$min]->kriteria_4 +
                    $normalisasi_terbobot[$min]->kriteria_5 +
                    $normalisasi_terbobot[$min]->kriteria_6;
            }
        }
        // for ($min = 0; $min < count($normalisasi_terbobot); $min++) {
        //     ${"min$min"} = $normalisasi_terbobot[$min]->kriteria_1 +
        //         $normalisasi_terbobot[$min]->kriteria_2 +
        //         $normalisasi_terbobot[$min]->kriteria_6;
        // }

        // for ($max = 0; $max < count($normalisasi_terbobot); $max++) {
        //     ${"max$max"} = $normalisasi_terbobot[$max]->kriteria_3 +
        //         $normalisasi_terbobot[$max]->kriteria_4 +
        //         $normalisasi_terbobot[$max]->kriteria_5;
        // }

        // for ($i = 0; $i < count($normalisasi_terbobot); $i++) {
        //     Yi::create([
        //         'kode' => $normalisasi_terbobot[$i]->kode,
        //         'min' => ${"min$i"},
        //         'max' => ${"max$i"},
        //         'minmax' => ${"max$i"} - ${"min$i"},
        //     ]);
        // }
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
