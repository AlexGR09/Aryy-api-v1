<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergiesPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allergy_patients')->insert([
            [
                'food_allergy' => 'Camaron',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'Polvo',
            ],
            [
                'food_allergy' => 'Chocolate, Lacteos',
                'drug_allergy' => 'Anpicilina',
                'environmental_allergy' => 'Polen',
            ],
            [
                'food_allergy' => 'N/A',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'N/A',
            ],
            [
                'food_allergy' => 'Atún',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'N/A',
            ],
            [
                'food_allergy' => 'N/A',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'N/A',
            ],
            [
                'food_allergy' => 'N/A',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'N/A',
            ],
            [
                'food_allergy' => 'Durazno',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'N/A',
            ],
            [
                'food_allergy' => 'N/A',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'N/A',
            ],
            [
                'food_allergy' => 'N/A',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'Agua',
            ],
            [
                'food_allergy' => 'N/A',
                'drug_allergy' => 'N/A',
                'environmental_allergy' => 'N/A',
            ],

        ]);
    }
}
