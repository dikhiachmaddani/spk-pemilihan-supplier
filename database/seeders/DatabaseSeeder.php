<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alternatif;
use App\Models\AlternatifType;
use App\Models\Kriteria;
use App\Models\KriteriaType;
use App\Models\Matriks;
use App\Models\Normalisasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Kriteria::insert([
            [
                'kode' => 'C1',
                'bobot' => '0.30',
                'tipe' => 'benefit',
            ],
            [
                'kode' => 'C2',
                'bobot' => '0.25',
                'tipe' => 'benefit',
            ],
            [
                'kode' => 'C3',
                'bobot' => '0.20',
                'tipe' => 'cost',
            ],
            [
                'kode' => 'C4',
                'bobot' => '0.15',
                'tipe' => 'cost',
            ],
            [
                'kode' => 'C5',
                'bobot' => '0.10',
                'tipe' => 'benefit',
            ],
        ]);

        Alternatif::insert([
            [
                'kode' => 'A1',
                'alternatif' => 'Avitel'
            ],
            [
                'kode' => 'A2',
                'alternatif' => 'Nippon'
            ],
            [
                'kode' => 'A3',
                'alternatif' => 'Paragon'
            ],
            [
                'kode' => 'A4',
                'alternatif' => 'Emco'
            ],
            [
                'kode' => 'A5',
                'alternatif' => 'Decolit'
            ],
        ]);

        KriteriaType::insert([
            [
                'kode' => 'C1',
            ],
            [
                'kode' => 'C2',
            ],
            [
                'kode' => 'C3',
            ],
            [
                'kode' => 'C4',
            ],
            [
                'kode' => 'C5',
            ],
        ]);

        AlternatifType::insert([
            [
                'kode' => 'A1',
            ],
            [
                'kode' => 'A2',
            ],
            [
                'kode' => 'A3',
            ],
            [
                'kode' => 'A4',
            ],
            [
                'kode' => 'A5',
            ],
        ]);

        Matriks::insert([
            [
                'kode' => 'A1',
                'kriteria_1' => 2,
                'kriteria_2' => 3,
                'kriteria_3' => 2,
                'kriteria_4' => 3,
                'kriteria_5' => 3,
            ],
            [
                'kode' => 'A2',
                'kriteria_1' => 1,
                'kriteria_2' => 2,
                'kriteria_3' => 1,
                'kriteria_4' => 1,
                'kriteria_5' => 3,
            ],
            [
                'kode' => 'A3',
                'kriteria_1' => 2,
                'kriteria_2' => 3,
                'kriteria_3' => 2,
                'kriteria_4' => 1,
                'kriteria_5' => 3,
            ],
            [
                'kode' => 'A4',
                'kriteria_1' => 1,
                'kriteria_2' => 2,
                'kriteria_3' => 1,
                'kriteria_4' => 2,
                'kriteria_5' => 2,
            ],
            [
                'kode' => 'A5',
                'kriteria_1' => 3,
                'kriteria_2' => 1,
                'kriteria_3' => 3,
                'kriteria_4' => 2,
                'kriteria_5' => 1,
            ],
        ]);
    }
}
