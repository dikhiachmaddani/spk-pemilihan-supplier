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
        $this->call([
            KriteriaSeeder::class,
            KriteriaTypeSeeder::class,
            AlternatifSeeder::class,
            MatriksSeeder::class,
        ]);
    }
}
