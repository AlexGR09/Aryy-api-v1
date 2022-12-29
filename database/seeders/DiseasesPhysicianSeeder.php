<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseasesPhysicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disease_physician')->insert([
            //alergologo
            [
                'disease_id' => 315,
                'physician_id' => 1,
            ],
            [
                'disease_id' => 14,
                'physician_id' => 1,
            ],
            [
                'disease_id' => 18,
                'physician_id' => 1,
            ],
            [
                'disease_id' => 25,
                'physician_id' => 1,
            ],
            [
                'disease_id' => 28,
                'physician_id' => 1,
            ],
            //alergologo
            //audiologo
            [
                'disease_id' => 300,
                'physician_id' => 2,
            ],
            [
                'disease_id' => 294,
                'physician_id' => 2,
            ],
            [
                'disease_id' => 298,
                'physician_id' => 2,
            ],
            [
                'disease_id' => 295,
                'physician_id' => 2,
            ],
            [
                'disease_id' => 293,
                'physician_id' => 2,
            ],
            //audiologo
            //cirujano pediatrico
            [
                'disease_id' => 669,
                'physician_id' => 3,
            ],
            [
                'disease_id' => 836,
                'physician_id' => 3,
            ],
            [
                'disease_id' => 880,
                'physician_id' => 3,
            ],
            [
                'disease_id' => 316,
                'physician_id' => 3,
            ],
            [
                'disease_id' => 846,
                'physician_id' => 3,
            ],
            //cirujano pediatrico
            //enfermero
            [
                'disease_id' => 310,
                'physician_id' => 4,
            ],
            [
                'disease_id' => 1442,
                'physician_id' => 4,
            ],
            [
                'disease_id' => 1457,
                'physician_id' => 4,
            ],
            [
                'disease_id' => 45,
                'physician_id' => 4,
            ],
            [
                'disease_id' => 1184,
                'physician_id' => 4,
            ],
            //enfermero
            //dermatologo pediatrico
            [
                'disease_id' => 909,
                'physician_id' => 5,
            ],
            [
                'disease_id' => 921,
                'physician_id' => 5,
            ],
            [
                'disease_id' => 13,
                'physician_id' => 5,
            ],
            [
                'disease_id' => 947,
                'physician_id' => 5,
            ],
            [
                'disease_id' => 949,
                'physician_id' => 5,
            ],
            //dermatologo pediatrico
            //
            //alergologo
            [
                'disease_id' => 315,
                'physician_id' => 6,
            ],
            [
                'disease_id' => 14,
                'physician_id' => 6,
            ],
            [
                'disease_id' => 18,
                'physician_id' => 6,
            ],
            [
                'disease_id' => 25,
                'physician_id' => 6,
            ],
            [
                'disease_id' => 28,
                'physician_id' => 6,
            ],
            //alergologo
            //audiologo
            [
                'disease_id' => 300,
                'physician_id' => 7,
            ],
            [
                'disease_id' => 294,
                'physician_id' => 7,
            ],
            [
                'disease_id' => 298,
                'physician_id' => 7,
            ],
            [
                'disease_id' => 295,
                'physician_id' => 7,
            ],
            [
                'disease_id' => 293,
                'physician_id' => 7,
            ],
            //audiologo
            //cirujano pediatrico
            [
                'disease_id' => 669,
                'physician_id' => 8,
            ],
            [
                'disease_id' => 836,
                'physician_id' => 8,
            ],
            [
                'disease_id' => 880,
                'physician_id' => 8,
            ],
            [
                'disease_id' => 316,
                'physician_id' => 8,
            ],
            [
                'disease_id' => 846,
                'physician_id' => 8,
            ],
            //cirujano pediatrico
            //enfermero
            [
                'disease_id' => 310,
                'physician_id' => 9,
            ],
            [
                'disease_id' => 1442,
                'physician_id' => 9,
            ],
            [
                'disease_id' => 1457,
                'physician_id' => 9,
            ],
            [
                'disease_id' => 45,
                'physician_id' => 9,
            ],
            [
                'disease_id' => 1184,
                'physician_id' => 9,
            ],
            //enfermero
            //dermatologo pediatrico
            [
                'disease_id' => 909,
                'physician_id' => 10,
            ],
            [
                'disease_id' => 921,
                'physician_id' => 10,
            ],
            [
                'disease_id' => 13,
                'physician_id' => 10,
            ],
            [
                'disease_id' => 947,
                'physician_id' => 10,
            ],
            [
                'disease_id' => 949,
                'physician_id' => 10,
            ],
            //dermatologo pediatrico
        ]);
    }
}
