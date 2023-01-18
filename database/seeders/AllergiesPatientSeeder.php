<?php

namespace Database\Seeders;

use App\Models\AllergyPatient;
use Illuminate\Database\Seeder;

class AllergiesPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AllergyPatient::insert([
            [
                'food_allergy' => json_encode(['Camaron']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['Polvo']),
            ],
            [
                'food_allergy' => json_encode(['Chocolate, Lacteos']),
                'drug_allergy' => json_encode(['Anpicilina']),
                'environmental_allergy' => json_encode(['Polen']),
            ],
            [
                'food_allergy' => json_encode(['N/A']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['N/A']),
            ],
            [
                'food_allergy' => json_encode(['Atún']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['N/A']),
            ],
            [
                'food_allergy' => json_encode(['N/A']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['N/A']),
            ],
            [
                'food_allergy' => json_encode(['N/A']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['N/A']),
            ],
            [
                'food_allergy' => json_encode(['Durazno']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['N/A']),
            ],
            [
                'food_allergy' => json_encode(['N/A']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['N/A']),
            ],
            [
                'food_allergy' => json_encode(['N/A']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['Agua']),
            ],
            [
                'food_allergy' => json_encode(['N/A']),
                'drug_allergy' => json_encode(['N/A']),
                'environmental_allergy' => json_encode(['N/A']),
            ],

        ]);
    }
}
