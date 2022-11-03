<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhysicianSeeder extends Seeder
{

    public function run()
    {
        DB::table('physicians')->insert([
            [
                'user_id'=>3,
                'professional_name'=>'Medico 1'
            ],
            [
                'user_id'=>4,
                'professional_name'=>'Dr. Fulanito'
            ],
            [
                'user_id'=>5,
                'professional_name'=>'Dr. Menganito'
            ],
            [
                'user_id'=>6,
                'professional_name'=>'Dr. Armando'
            ],
            [
                'user_id'=>7,
                'professional_name'=>'Dr. Daniel'
            ],


        ]);
    }
}
