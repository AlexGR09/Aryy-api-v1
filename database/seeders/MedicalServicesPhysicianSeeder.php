<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalServicesPhysicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_service_physician')->insert([
            //alergologo
            [
                'medical_service_id'  => 12,
                'physician_id' => 1
            ],
            [
                'medical_service_id'  => 20,
                'physician_id' => 1
            ],
            [
                'medical_service_id'  => 29,
                'physician_id' => 1
            ],
            [
                'medical_service_id'  => 37,
                'physician_id' => 1
            ],
            [
                'medical_service_id'  => 18,
                'physician_id' => 1
            ],
            
            //alergologo
            //audiologo
            [
                'medical_service_id'  => 293,
                'physician_id' => 2
            ],
            [
                'medical_service_id'  => 297,
                'physician_id' => 2
            ],
            [
                'medical_service_id'  => 304,
                'physician_id' => 2
            ],
            [
                'medical_service_id'  => 294,
                'physician_id' => 2
            ],
            [
                'medical_service_id'  => 13,
                'physician_id' => 2
            ],

            //audiologo
            //cirujano pediatrico
            [
                'medical_service_id'  => 530,
                'physician_id' => 3
            ],
            [
                'medical_service_id'  => 988,
                'physician_id' => 3
            ],
            [
                'medical_service_id'  => 562,
                'physician_id' => 3
            ],
            [
                'medical_service_id'  => 1016,
                'physician_id' => 3
            ],
            [
                'medical_service_id'  => 1050,
                'physician_id' => 3
            ],

            //cirujano pediatrico
            //enfermero
            [
                'medical_service_id'  => 1240,
                'physician_id' => 4
            ],
            [
                'medical_service_id'  => 1248,
                'physician_id' => 4
            ],
            [
                'medical_service_id'  => 1254,
                'physician_id' => 4
            ],
            [
                'medical_service_id'  => 1259,
                'physician_id' => 4
            ],
            [
                'medical_service_id'  => 1261,
                'physician_id' => 4
            ],
            //enfermero
            //dermatologo pediatrico
            [
                'medical_service_id'  => 1209,
                'physician_id' => 5
            ],
            [
                'medical_service_id'  => 1185,
                'physician_id' => 5
            ],
            [
                'medical_service_id'  => 1047,
                'physician_id' => 5
            ],
            [
                'medical_service_id'  => 1206,
                'physician_id' => 5
            ],
            [
                'medical_service_id'  => 1197,
                'physician_id' => 5
            ],
            
            //dermatologo pediatrico
            //
             //alergologo
             [
                'medical_service_id'  => 12,
                'physician_id' => 6
            ],
            [
                'medical_service_id'  => 20,
                'physician_id' => 6
            ],
            [
                'medical_service_id'  => 29,
                'physician_id' => 6
            ],
            [
                'medical_service_id'  => 37,
                'physician_id' => 6
            ],
            [
                'medical_service_id'  => 18,
                'physician_id' => 6
            ],
            
            //alergologo
            //audiologo
            [
                'medical_service_id'  => 293,
                'physician_id' => 7
            ],
            [
                'medical_service_id'  => 297,
                'physician_id' => 7
            ],
            [
                'medical_service_id'  => 304,
                'physician_id' => 7
            ],
            [
                'medical_service_id'  => 294,
                'physician_id' => 7
            ],
            [
                'medical_service_id'  => 13,
                'physician_id' => 7
            ],

            //audiologo
            //cirujano pediatrico
            [
                'medical_service_id'  => 530,
                'physician_id' => 8
            ],
            [
                'medical_service_id'  => 988,
                'physician_id' => 8
            ],
            [
                'medical_service_id'  => 562,
                'physician_id' => 8
            ],
            [
                'medical_service_id'  => 1016,
                'physician_id' => 8
            ],
            [
                'medical_service_id'  => 1050,
                'physician_id' => 8
            ],

            //cirujano pediatrico
            //enfermero
            [
                'medical_service_id'  => 1240,
                'physician_id' => 9
            ],
            [
                'medical_service_id'  => 1248,
                'physician_id' => 9
            ],
            [
                'medical_service_id'  => 1254,
                'physician_id' => 9
            ],
            [
                'medical_service_id'  => 1259,
                'physician_id' => 9
            ],
            [
                'medical_service_id'  => 1261,
                'physician_id' => 9
            ],
            //enfermero
            //dermatologo pediatrico
            [
                'medical_service_id'  => 1209,
                'physician_id' => 10
            ],
            [
                'medical_service_id'  => 1185,
                'physician_id' => 10
            ],
            [
                'medical_service_id'  => 1047,
                'physician_id' => 10
            ],
            [
                'medical_service_id'  => 1206,
                'physician_id' => 10
            ],
            [
                'medical_service_id'  => 1197,
                'physician_id' => 10
            ],
            //dermatologo pediatrico
        ]);
    }
}
