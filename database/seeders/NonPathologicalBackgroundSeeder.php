<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NonPathologicalBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('non_pathological_backgrounds')->insert([
            [
                'id' => 1,
                'drug_active' => 'Ibuprofeno • 10mg • Comprimido,Paracetamol - 10mg - Comprimido',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 2,
                'drug_active' => 'Ibuprofeno • 10mg • Comprimido',
                'previous_medication' => 'Paracetamol • 10mg • Comprimido',
            ],
            [
                'id' => 3,
                'drug_active' => 'Ibuprofeno • 10mg • Comprimido,Paracetamol • 10mg • Comprimido,Amoxilina • 10mg • Comprimido',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 4,
                'drug_active' => 'Ibuprofeno • 10mg • Comprimido',
                'previous_medication' => 'Naproxeno',
            ],
            [
                'id' => 5,
                'drug_active' => 'Ibuprofeno • 10mg • Comprimido,Naproxeno • 10mg • Comprimido',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 6,
                'drug_active' => 'Simvastatina • 10mg • Comprimido',
                'previous_medication' => 'Ibuprofeno',
            ],
            [
                'id' => 7,
                'drug_active' => 'Omeprazol • 10mg • Comprimido',
                'previous_medication' => 'Aspirina',
            ],
            [
                'id' => 8,
                'drug_active' => 'Ibuprofeno • 10mg • Comprimido,Aspirina • 10mg • Comprimido',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 9,
                'drug_active' => 'Amlodipina • 10mg • Comprimido',
                'previous_medication' => 'Ibuprofeno',
            ],
            [
                'id' => 10,
                'drug_active' => 'Ibuprofeno • 10mg • Comprimido',
                'previous_medication' => 'Salbutamol',
            ],

        ]);
    }
}
