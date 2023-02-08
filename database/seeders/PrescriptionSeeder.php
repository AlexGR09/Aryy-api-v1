<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionSeeder extends Seeder
{
    public function run()
    {
        $treatment = [
            'brand' => 'loperemx',
            'drug_name' => 'loperamida',
            'presentation' => 'tabletas',
            'instruction' => 'Tomar después de los alimentos',
            'amount' => '1',
            'frequency' => 'cada 8hrs',
            'duration_days' => random_int(3, 14),
        ];

        DB::table('prescriptions')->insert([
            [
                'id' => 1,
                'vital_sign_id' => 1,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 2,
                'vital_sign_id' => 2,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 3,
                'vital_sign_id' => 3,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 4,
                'vital_sign_id' => 4,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 5,
                'vital_sign_id' => 5,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 6,
                'vital_sign_id' => 6,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 7,
                'vital_sign_id' => 7,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 8,
                'vital_sign_id' => 8,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 9,
                'vital_sign_id' => 9,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
            [
                'id' => 10,
                'vital_sign_id' => 10,
                'symptom' => 'dolor de cabeza',
                'diagnosis' => 'Migraña',
                'medical_examination' => null,
                'treatment' => json_encode($treatment),
                'laboratory_studies' => null,
                'cabinet_studies' => null,
            ],
        ]);
    }
}
