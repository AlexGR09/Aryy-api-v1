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
            ['medicine' => 'Ibuprofeno • 10mg • Comprimido,Paracetamol - 10mg - Comprimido'],
            ['medicine' => 'Amoxilina • 10mg • Comprimido,Paracetamol - 10mg - Comprimido'],
            ['medicine' => 'Omeprazol • 10mg • Comprimido,Paracetamol - 10mg - Comprimido']
        ];
        $medicine_an = [
            ['medicine'=> 'Paracetamol • 10mg • Comprimido'],
            ['medicine'=> 'Naproxeno • 10mg • Comprimido'],
            ['medicine'=> 'Ibuprofeno • 10mg • Comprimido'],
            ['medicine'=> 'Salbutamol • 10mg • Comprimido']
        ];

        DB::table('non_pathological_backgrounds')->insert([
            [
                'id' => 1,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 2,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 3,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 4,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 5,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 6,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 7,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 8,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 9,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],
            [
                'id' => 10,
                'drug_active' => json_encode($medicine_ac),
                'previous_medication' => json_encode($medicine_an),
            ],

        ]);
    }
}