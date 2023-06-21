<?php

namespace Database\Seeders;

use App\Models\Matriks;
use Illuminate\Database\Seeder;

class MatriksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matriks::insert([
            [
                'kode' => 'A1',
                'kriteria_1' => 6.5,
                'kriteria_2' => 1.2,
                'kriteria_3' => 65,
                'kriteria_4' => 180,
                'kriteria_5' => 7,
                'kriteria_6' => 16250,
            ],
            [
                'kode' => 'A2',
                'kriteria_1' => 5.3,
                'kriteria_2' => 2,
                'kriteria_3' => 76,
                'kriteria_4' => 600,
                'kriteria_5' => 7,
                'kriteria_6' => 13250,
            ],
            [
                'kode' => 'A3',
                'kriteria_1' => 4.6,
                'kriteria_2' => 3.8,
                'kriteria_3' => 54,
                'kriteria_4' => 135,
                'kriteria_5' => 7,
                'kriteria_6' => 11500,
            ],
            [
                'kode' => 'A4',
                'kriteria_1' => 4.4,
                'kriteria_2' => 4.6,
                'kriteria_3' => 47,
                'kriteria_4' => 900,
                'kriteria_5' => 7,
                'kriteria_6' => 1100,
            ],
            [
                'kode' => 'A5',
                'kriteria_1' => 3.6,
                'kriteria_2' => 6.6,
                'kriteria_3' => 45,
                'kriteria_4' => 300,
                'kriteria_5' => 7,
                'kriteria_6' => 9000,
            ],
            [
                'kode' => 'A6',
                'kriteria_1' => 4.1,
                'kriteria_2' => 7.1,
                'kriteria_3' => 42,
                'kriteria_4' => 1500,
                'kriteria_5' => 7,
                'kriteria_6' => 10250,
            ],
            [
                'kode' => 'A7',
                'kriteria_1' => 5.1,
                'kriteria_2' => 8.3,
                'kriteria_3' => 65,
                'kriteria_4' => 65,
                'kriteria_5' => 7,
                'kriteria_6' => 12750,
            ],
            [
                'kode' => 'A8',
                'kriteria_1' => 4.7,
                'kriteria_2' => 8.5,
                'kriteria_3' => 69,
                'kriteria_4' => 69,
                'kriteria_5' => 7,
                'kriteria_6' => 11750,
            ],
            [
                'kode' => 'A9',
                'kriteria_1' => 3.6,
                'kriteria_2' => 9.8,
                'kriteria_3' => 75,
                'kriteria_4' => 75,
                'kriteria_5' => 7,
                'kriteria_6' => 9000,
            ],
            [
                'kode' => 'A10',
                'kriteria_1' => 3.5,
                'kriteria_2' => 9.7,
                'kriteria_3' => 72,
                'kriteria_4' => 72,
                'kriteria_5' => 7,
                'kriteria_6' => 8750,
            ],
        ]);
    }
}
