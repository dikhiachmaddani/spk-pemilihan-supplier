<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::insert([
            [
                'kode' => 'C1',
                'kriteria' => 'Jarak Lokasi Pasar',
                'bobot' => '0.408',
                'tipe' => 'cost',
            ],
            [
                'kode' => 'C2',
                'kriteria' => 'Jarak Supplier Pasar',
                'bobot' => '0.242',
                'tipe' => 'cost',
            ],
            [
                'kode' => 'C3',
                'kriteria' => 'Jarak Dengan Pemukiman',
                'bobot' => '0.158',
                'tipe' => 'benefit',
            ],
            [
                'kode' => 'C4',
                'kriteria' => 'Luas Lahan',
                'bobot' => '0.103',
                'tipe' => 'benefit',
            ],
            [
                'kode' => 'C5',
                'kriteria' => 'Sumber Air',
                'bobot' => '0.061',
                'tipe' => 'benefit',
            ],
            [
                'kode' => 'C6',
                'kriteria' => 'Akses Transportasi',
                'bobot' => '0.028',
                'tipe' => 'cost',
            ],
        ]);
    }
}
