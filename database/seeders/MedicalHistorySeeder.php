<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalHistorySeeder extends Seeder
{
    public function run()
    {
        $history1 = [
            'campo 1' => 'valor 1',
            'campo 2' => 'valor 2',
        ];
        $history2 = [
            'campo 3' => 'valor 3',
            'campo 4' => 'valor 4',
        ];

        DB::table('medical_histories')->insert([
            [

                'patient_id' => 1,
                'allergy_patient_id' => 1,

            ],
            [

                'patient_id' => 2,
                'allergy_patient_id' => 2,
            ],
            [

                'patient_id' => 3,
                'allergy_patient_id' => 9,
            ],
            [

                'patient_id' => 4,
                'allergy_patient_id' => 5,
            ],
            [

                'patient_id' => 5,
                'allergy_patient_id' => 4,
            ],
            [

                'patient_id' => 6,
                'allergy_patient_id' => 6,
            ],
            [

                'patient_id' => 7,
                'allergy_patient_id' => 10,
            ],
            [

                'patient_id' => 8,
                'allergy_patient_id' => 3,
            ],
            [

                'patient_id' => 9,
                'allergy_patient_id' => 8,
            ],
            [

                'patient_id' => 10,
                'allergy_patient_id' => 7,
            ],

        ]);
    }
}
