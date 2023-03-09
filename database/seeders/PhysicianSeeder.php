<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PhysicianSeeder extends Seeder
{
    public function run()
    {
    $faker = Faker::create();
        DB::table('physicians')->insert([
            [
                'user_id' => 3,
                'professional_name' => 'Medico 1',
                'gender'=>'Masculino',
                'birthday'=> $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 4,
                'professional_name' => 'Dr. Fulanito',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 5,
                'professional_name' => 'Dr. Menganito',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 6,
                'professional_name' => 'Dr. Armando',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 7,
                'professional_name' => 'Dr. Daniel',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 8,
                'professional_name' => 'Dr. Marco',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 9,
                'professional_name' => 'Dr. Angel',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 10,
                'professional_name' => 'Dr. Miguel',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 11,
                'professional_name' => 'Dr. Joel',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],
            [
                'user_id' => 12,
                'professional_name' => 'Dr. Alejandro',
                'gender' => 'Masculino',
                'birthday' => $faker->date(),
                'is_verified' => 'verified',
                'first_time_consultation' => 100,
                'subsequent_consultation' => 50,
            ],

        ]);
    }
}
