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
                'drug_active' => 'Ibuprofeno,Paracetamol',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 2,
                'drug_active' => 'Ibuprofeno',
                'previous_medication' => 'Paracetamol',
            ],
            [
                'id' => 3,
                'drug_active' => 'Ibuprofeno,Paracetamol,Amoxilina',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 4,
                'drug_active' => 'Ibuprofeno',
                'previous_medication' => 'Naproxeno',
            ],
            [
                'id' => 5,
                'drug_active' => 'Ibuprofeno,Naproxeno',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 6,
                'drug_active' => 'Simvastatina',
                'previous_medication' => 'Ibuprofeno',
            ],
            [
                'id' => 7,
                'drug_active' => 'Omeprazol',
                'previous_medication' => 'Aspirina',
            ],
            [
                'id' => 8,
                'drug_active' => 'Ibuprofeno,Aspirina',
                'previous_medication' => 'N/A',
            ],
            [
                'id' => 9,
                'drug_active' => 'Amlodipina',
                'previous_medication' => 'Ibuprofeno',
            ],
            [
                'id' => 10,
                'drug_active' => 'Ibuprofeno',
                'previous_medication' => 'Salbutamol',
            ],

        ]);
    }
}
