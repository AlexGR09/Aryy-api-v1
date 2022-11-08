<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FacilitySeeder extends Seeder
{
    /**
     * $faker->streetAddress
     * $faker->regexify('[0-9]{8}')
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        /* <--------------------------------------DIRECCIONES--------------------------------------> */
        $location = [
            "address" => $faker->streetAddress,
            "num_int" => "#120",
            "num_ext" => "#2",
            "reference" => "Parque"
        ];
/*         $location2 = [
            'address' => $faker->streetAddress,
            'num_int' => '#123',
            'num_ext' => '#8',
            'reference' => 'Parque'
        ];
        $location3 = [
            'address' => $faker->streetAddress,
            'num_int' => '#12',
            'num_ext' => '',
            'reference' => ''
        ];
        $location4 = [
            'address' => $faker->streetAddress,
            'num_int' => '#23',
            'num_ext' => '#12',
            'reference' => 'OXXO'
        ];
        $location5 = [
            'address' => $faker->streetAddress,
            'num_int' => '',
            'num_ext' => '#27',
            'reference' => ''
        ]; */
        /* <--------------------------------------HORARIOS--------------------------------------> */
        $days = [
            'day' => 'Lunes',
            'day2' => 'Martes',
            'day3' => 'Miercoles'
        ];
        $horarios = [
            'type of schedule' => 'Permenente',
            'days' => json_encode($days),
            'hours' => '09:00 - 19:00'
        ];

        DB::table('facilities')->insert([
            [
                'facility_name' => 'Consultorio medico 1',
                'location' => json_encode($location),
                'phone_number' => $faker->regexify('[0-9]{8}'),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'schedule' => json_encode($horarios),
                'city_id' => 3
            ],
            [
                'facility_name' => 'Consultorio medico Dr. Fulanito',
                'location' => json_encode($location),
                'phone_number' => $faker->regexify('[0-9]{8}'),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'schedule' => json_encode($horarios),
                'city_id' => 6
            ],
            [
                'facility_name' => 'Consultorio medico Dr. Menganito',
                'location' => json_encode($location),
                'phone_number' => $faker->regexify('[0-9]{8}'),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'schedule' => json_encode($horarios),
                'city_id' => 10
            ],
            [
                'facility_name' => 'Consultorio medico Dr. Armando',
                'location' => json_encode($location),
                'phone_number' => $faker->regexify('[0-9]{8}'),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'schedule' => json_encode($horarios),
                'city_id' => 12
            ],
            [
                'facility_name' => 'Consultorio medico Dr. Daniel',
                'location' => json_encode($location),
                'phone_number' => $faker->regexify('[0-9]{8}'),
                'zip_code' => $faker->regexify('[0-9]{5}'),
                'schedule' => json_encode($horarios),
                'city_id' => 12
            ],

        ]);
    }
}
