<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternatif::insert([
            [
                'kode' => 'A1',
                'alternatif' => 'Nglampir'
            ],
            [
                'kode' => 'A2',
                'alternatif' => 'TalunKulon'
            ],
            [
                'kode' => 'A3',
                'alternatif' => 'Bantengan'
            ],
            [
                'kode' => 'A4',
                'alternatif' => 'Sebalor'
            ],
            [
                'kode' => 'A5',
                'alternatif' => 'Sukoharjo'
            ],
            [
                'kode' => 'A6',
                'alternatif' => 'Suko'
            ],
            [
                'kode' => 'A7',
                'alternatif' => 'Ngepeh'
            ],
            [
                'kode' => 'A8',
                'alternatif' => 'Mbulus'
            ],
            [
                'kode' => 'A9',
                'alternatif' => 'Gandong'
            ],
            [
                'kode' => 'A10',
                'alternatif' => 'Kesambi'
            ],
        ]);
    }
}
