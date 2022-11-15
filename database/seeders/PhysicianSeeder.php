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
                'user_id' => 3,
                'professional_name' => 'Medico 1',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 4,
                'professional_name' => 'Dr. Fulanito',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 5,
                'professional_name' => 'Dr. Menganito'
                ,'is_verified' => 'verified'
            ],
            [
                'user_id' => 6,
                'professional_name' => 'Dr. Armando',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 7,
                'professional_name' => 'Dr. Daniel',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 8,
                'professional_name' => 'Dr. Marco',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 9,
                'professional_name' => 'Dr. Angel',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 10,
                'professional_name' => 'Dr. Miguel',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 11,
                'professional_name' => 'Dr. Joel',
                'is_verified' => 'verified'
            ],
            [
                'user_id' => 12,
                'professional_name' => 'Dr. Alejandro',
                'is_verified' => 'verified'
            ],



        ]);
    }
}
