<?php

namespace Database\Seeders;

use App\Models\Facility;
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
        $facilities = [];
        for ($i=0; $i < 10; $i++) { 
            $facilities[] = [
                'name' => "Consultorio medico {$i}",
                'phone' => fake()->regexify('[0-9]{8}'),
                "street" => fake()->streetAddress(),
                "interior_no" => "#120",
                "exterior_no" => "#2",
                "references" => fake()->streetAddress(),
                'zipcode' => fake()->regexify('[0-9]{5}'),
                'schedule' => json_encode($horarios),
                'services' => json_encode($horarios),
                'city_id' => 3,
                'created_at' => now(),
            ];
        }
        Facility::insert($facilities);
    }
}
