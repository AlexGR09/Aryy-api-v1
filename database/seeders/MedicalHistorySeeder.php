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
                'postnatal_background_id' => null,
                'non_pathological_background_id' => 1,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],
            [
                'patient_id' => 2,
                'allergy_patient_id' => 2,
                'postnatal_background_id' => 2,
                'non_pathological_background_id' => 2,
                'obstetric_gynecological_background_id' => 1,
                'perinatal_background_id'=> 1,
            ],
            [
                'patient_id' => 3,
                'allergy_patient_id' => 9,
                'postnatal_background_id' => 3,
                'non_pathological_background_id' => 3,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],
            [
                'patient_id' => 4,
                'allergy_patient_id' => 5,
                'postnatal_background_id' => 4,
                'non_pathological_background_id' => 4,
                'obstetric_gynecological_background_id' => 2,
                'obstetric_gynecological_background_id' => 2,
                'perinatal_background_id'=> 2,
            ],
            [
                'patient_id' => 5,
                'allergy_patient_id' => 4,
                'postnatal_background_id' => 5,
                'non_pathological_background_id' => 5,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],
            [
                'patient_id' => 6,
                'allergy_patient_id' => 6,
                'postnatal_background_id' => 6,
                'non_pathological_background_id' => 6,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],
            [
                'patient_id' => 7,
                'allergy_patient_id' => 10,
                'postnatal_background_id' => 7,
                'non_pathological_background_id' => 7,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],
            [
                'patient_id' => 8,
                'allergy_patient_id' => 3,
                'postnatal_background_id' => 8,
                'non_pathological_background_id' => 8,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],
            [
                'patient_id' => 9,
                'allergy_patient_id' => 8,
                'postnatal_background_id' => 9,
                'non_pathological_background_id' => 9,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],
            [
                'patient_id' => 10,
                'allergy_patient_id' => 7,
                'postnatal_background_id' => 10,
                'non_pathological_background_id' => 10,
                'obstetric_gynecological_background_id' => null,
                'perinatal_background_id'=> null,
            ],

        ]);
    }
}
