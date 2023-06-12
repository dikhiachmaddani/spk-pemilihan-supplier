<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Matriks;
use App\Models\MatriksAPB;
use App\Models\MatriksJA;
use App\Models\Normalisasi;
use App\Models\Normalisasi2;
use App\Models\Normalisasi3;
use App\Models\Normalisasi_Terbobot;
use App\Models\Result;
use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    public function normalisasi()
    {
        $matriks = Matriks::all();
        foreach ($matriks as $data) {
            Normalisasi::create([
                'kode' => $data->kode,
                'kriteria_1' => pow($data->kriteria_1, 2),
                'kriteria_2' => pow($data->kriteria_2, 2),
                'kriteria_3' => pow($data->kriteria_3, 2),
                'kriteria_4' => pow($data->kriteria_4, 2),
                'kriteria_5' => pow($data->kriteria_5, 2),
            ]);
        }
        return redirect()->route('result.index');
    }

    public function normalisasi2()
    {
        $normalisasi = Normalisasi::all();
        $c1 = 0;
        $c2 = 0;
        $c3 = 0;
        $c4 = 0;
        $c5 = 0;
        foreach ($normalisasi as $data) {
            $c1 += $data->kriteria_1;
            $c2 += $data->kriteria_2;
            $c3 += $data->kriteria_3;
            $c4 += $data->kriteria_4;
            $c5 += $data->kriteria_5;
        }
        Normalisasi2::create([
            'kode' => 'normalisasi',
            'kriteria_1' => sqrt($c1),
            'kriteria_2' => sqrt($c2),
            'kriteria_3' => sqrt($c3),
            'kriteria_4' => sqrt($c4),
            'kriteria_5' => sqrt($c5),
        ]);
        return redirect()->route('result.index');
    }

    public function normalisasi3()
    {
        $matriks = Matriks::all();
        $getStep2 = Normalisasi2::first();
        foreach ($matriks as $data) {
            Normalisasi3::create([
                'kode' => $data->kode,
                'kriteria_1' => $data->kriteria_1 / $getStep2->kriteria_1,
                'kriteria_2' => $data->kriteria_2 / $getStep2->kriteria_2,
                'kriteria_3' => $data->kriteria_3 / $getStep2->kriteria_3,
                'kriteria_4' => $data->kriteria_4 / $getStep2->kriteria_4,
                'kriteria_5' => $data->kriteria_5 / $getStep2->kriteria_5,
            ]);
        }
        return redirect()->route('result.index');
    }

    public function normalisasiTerbobot()
    {
        $matriks = Normalisasi3::all();
        $bobot = Kriteria::all();
        // dd($d[0]->bobot);
        for ($i = 0; $i < count($matriks); $i++) {
            Normalisasi_Terbobot::create([
                'kode' => $matriks[$i]->kode,
                'kriteria_1' => $matriks[$i]->kriteria_1 * $bobot[0]->bobot,
                'kriteria_2' => $matriks[$i]->kriteria_2 * $bobot[1]->bobot,
                'kriteria_3' => $matriks[$i]->kriteria_3 * $bobot[2]->bobot,
                'kriteria_4' => $matriks[$i]->kriteria_4 * $bobot[3]->bobot,
                'kriteria_5' => $matriks[$i]->kriteria_5 * $bobot[4]->bobot,
            ]);
        }
        return redirect()->route('result.index');
    }

    public function matriksApb()
    {
        $normalisasi_terbobot = Normalisasi_Terbobot::all();
        $c1 = 1;
        $c2 = 1;
        $c3 = 1;
        $c4 = 1;
        $c5 = 1;
        foreach ($normalisasi_terbobot as $data) {
            $c1 *= $data->kriteria_1;
            $c2 *= $data->kriteria_2;
            $c3 *= $data->kriteria_3;
            $c4 *= $data->kriteria_4;
            $c5 *= $data->kriteria_5;
        }

        MatriksAPB::create([
            'kode' => 'G',
            'kriteria_1' => pow($c1, 0.2),
            'kriteria_2' => pow($c2, 0.2),
            'kriteria_3' => pow($c3, 0.2),
            'kriteria_4' => pow($c4, 0.2),
            'kriteria_5' => pow($c5, 0.2),
        ]);
        return redirect()->route('result.index');
    }

    public function matriksJa()
    {
        $matriks = Normalisasi_Terbobot::all();
        $getMatriksApb = MatriksAPB::first();
        foreach ($matriks as $data) {
            MatriksJA::create([
                'kode' => $data->kode,
                'kriteria_1' => $data->kriteria_1 - $getMatriksApb->kriteria_1,
                'kriteria_2' => $data->kriteria_2 - $getMatriksApb->kriteria_2,
                'kriteria_3' => $data->kriteria_3 - $getMatriksApb->kriteria_3,
                'kriteria_4' => $data->kriteria_4 - $getMatriksApb->kriteria_4,
                'kriteria_5' => $data->kriteria_5 - $getMatriksApb->kriteria_5,
            ]);
        }
        return redirect()->route('result.index');
    }

    public function result()
    {
        $normalisasi_terbobot = MatriksJA::all();
        $supplier = Alternatif::all();
        for ($i = 0; $i <= count($normalisasi_terbobot); $i++) {
            ${"c$i"} = 0;
        }

        for ($i = 0; $i < count($normalisasi_terbobot); $i++) {
            ${"c$i"} = $normalisasi_terbobot[$i]->kriteria_1 +
                $normalisasi_terbobot[$i]->kriteria_2 +
                $normalisasi_terbobot[$i]->kriteria_3 +
                $normalisasi_terbobot[$i]->kriteria_4 +
                $normalisasi_terbobot[$i]->kriteria_5;

            Result::insert([
                'kode' => $normalisasi_terbobot[$i]->kode,
                'supplier' => $supplier[$i]->alternatif,
                'preference_value' => ${"c$i"},
            ]);
        }

        return redirect()->route('result.index');
    }
}
