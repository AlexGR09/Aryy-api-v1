<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $location = [
            'state'=>'Chiapas',
            'city'=> 'Tuxtla Gutierrez',
            'suburb'=>'las Arboledas',
            'address' => $faker->streetAddress,
            'outdoor_number'=>$faker->randomNumber(3),
            'interior_number'=>$faker->randomNumber(3),

        ];
        DB::table('patients')->insert([
            [

                'user_id' => 13,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 1,

            ],
            [

                'user_id' => 13,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 10,

            ],
            [

                'user_id' => 15,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 3,

            ],
            [

                'user_id' => 16,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 3,

            ],
            [

                'user_id' => 17,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 9,

            ],
            [

                'user_id' => 18,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 10,

            ],
            [

                'user_id' => 19,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 12,

            ],
            [

                'user_id' => 20,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 5,

            ],
            [

                'user_id' => 21,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 6,

            ],
            [

                'user_id' => 22,
                'full_name' => $faker->firstname,
                'gender'=>'Masculino',
                'birthday'=>$faker->date(),
                'address' => json_encode($location, JSON_THROW_ON_ERROR),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'country_code' => '+52',
                'emergency_number' => $faker->regexify('[0-9]{8}'),
                'city_id' => 7,

            ],

        ]);
    }
}
