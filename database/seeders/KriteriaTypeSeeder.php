<?php

namespace Database\Seeders;

use App\Models\KriteriaType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            [
                'kode' => 'C6',
            ],
        ]);
    }
}
