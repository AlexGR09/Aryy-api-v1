<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

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
            'day3' => 'Miercoles',
        ];
        $horarios = [
            'type of schedule' => 'Permenente',
            'days' => json_encode($days),
            'hours' => '09:00 - 19:00',
        ];
        $facilities = [];
        for ($i = 0; $i < 10; $i++) {
            $facility = Facility::create([
                'name' => "Consultorio medico {$i}",
                'location' => [
                    'address' => fake()->streetAddress(),
                    'state' => fake()->streetAddress(),
                    'number_ext' => '#120',
                    'number_int' => '#3',
                    'reference' => fake()->streetAddress(),
                    'suburb' => fake()->streetAddress(),
                ],
                'phone' => fake()->regexify('[0-9]{8}'),
                'extension' => '52',
                'zipcode' => fake()->regexify('[0-9]{5}'),
                'schedule' => [
                    [
                        'day' => 'Monday',
                        'attention_time' => '09:00am a 09:00pm',
                        'rest_hours' => '02:00pm a 03:00pm',
                    ],
                    [
                        'day' => 'Tuesday',
                        'attention_time' => '09:00am a 09:00pm',
                        'rest_hours' => '02:00pm a 03:00pm',
                    ],
                ],
                'type_schedule' => 'perm',
                'consultation_length' => 120,
                'accessibility_and_others' => [
                    'accessibility' => [
                        'parking_with_access_to_the_establishment' => true,
                        'wheelchair_lift_or_ramp' => true,
                        'toilets_with_wheelchair_access' => false,
                        'rest_area_with_wheelchair_access' => false,
                        'staff_trained_in_sign_language' => false,
                        'braille_signage_for_blind_people' => false,
                    ],
                    'usual_audiences' => [
                        'lgtb_friendly' => true,
                        'safe_space_for_transgender_people' => false,
                    ],
                    'services' => [
                        'toilets' => true,
                        'unisex_toilets' => true,
                        'wifi' => true,
                    ],
                ],
                'city_id' => 1,
            ]);
            $facility->users()->attach(['user_id' => 3]);
        }
    }
}
