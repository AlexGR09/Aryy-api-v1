<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('health_insurances')->insert([
            [
                'insurance_number'=>'123456789',
                'insurance_id'=>2,
                'patient_id' =>1
            ],
            [
                'insurance_number'=>'987563214',
                'insurance_id'=>3,
                'patient_id' =>2
            ],[
                'insurance_number'=>'789123456',
                'insurance_id'=>4,
                'patient_id' =>3
            ],[
                'insurance_number'=>'7531596842',
                'insurance_id'=>4,
                'patient_id' =>4
            ],[
                'insurance_number'=>'319785246',
                'insurance_id'=>2,
                'patient_id' =>5
            ],[
                'insurance_number'=>'7891594352',
                'insurance_id'=>3,
                'patient_id' =>6
            ],
            [
                'insurance_number'=>'023669874',
                'insurance_id'=>4,
                'patient_id' =>7
            ],
            [
                'insurance_number'=>'78995145325',
                'insurance_id'=>2,
                'patient_id' =>8
            ],
            [
                'insurance_number'=>'020205054',
                'insurance_id'=>3,
                'patient_id' =>9
            ],
            [
                'insurance_number'=>'741258963',
                'insurance_id'=>5,
                'patient_id' =>10
            ],
        ]);
    }
}
