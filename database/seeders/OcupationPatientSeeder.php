<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OcupationPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupation_patient')->insert([
            [
                'occupation_id'=>1,
                'patient_id'=>1
            ],
            [
                'occupation_id'=>10,
                'patient_id'=>2
            ],
            [
                'occupation_id'=>3,
                'patient_id'=>3
            ],
            [
                'occupation_id'=>12,
                'patient_id'=>4
            ],
            [
                'occupation_id'=>9,
                'patient_id'=>5
            ],
            [
                'occupation_id'=>5,
                'patient_id'=>6
            ],
            [
                'occupation_id'=>5,
                'patient_id'=>7
            ],
            [
                'occupation_id'=>8,
                'patient_id'=>8
            ],
            [
                'occupation_id'=>13,
                'patient_id'=>9
            ],
            [
                'occupation_id'=>15,
                'patient_id'=>10
            ],

        ]);
    }
}
