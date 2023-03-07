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
        $medicine_ac = [
            'Ibuprofeno • 10mg • Comprimido,Paracetamol - 10mg - Comprimido',
            'Amoxilina • 10mg • Comprimido,Paracetamol - 10mg - Comprimido',
            'Omeprazol • 10mg • Comprimido,Paracetamol - 10mg - Comprimido'
        ];

        DB::table('non_pathological_backgrounds')->insert([
            [
                'id' => 1,
                'drug_active' =>json_encode($medicine_ac),
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 2,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'Paracetamol • 10mg • Comprimido',
            ],
            [
                'id' => 3,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 4,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'Naproxeno • 10mg • Comprimido',
            ],
            [
                'id' => 5,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 6,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'Ibuprofeno • 10mg • Comprimido',
            ],
            [
                'id' => 7,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'Aspirina • 10mg • Comprimido',
            ],
            [
                'id' => 8,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 9,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'Ibuprofeno • 10mg • Comprimido',
            ],
            [
                'id' => 10,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => 'Salbutamol • 10mg • Comprimido',
            ],

        ]);
    }
}
