<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
            "address" => $faker->streetAddress,
            
        ];
        DB::table('patients')->insert([
            [
                
                'user_id'=>13,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>1
    
            ], 
            [
                
                'user_id'=>14,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>9
    
            ],
            [
                
                'user_id'=>15,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>13
    
            ],
            [
                
                'user_id'=>16,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>15
    
            ],
            [
                
                'user_id'=>17,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>18
    
            ],
            [
                
                'user_id'=>18,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>13
    
            ],
            [
                
                'user_id'=>19,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>19
    
            ],
            [
                
                'user_id'=>20,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>21
    
            ],
            [
                
                'user_id'=>21,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>31
    
            ],
            [
                
                'user_id'=>22,
                "address" => json_encode($location),
                'zip_code' =>$faker->regexify('[0-9]{5}'),
                'country_code' =>"+52",
                'emergency_number'=> $faker->regexify('[0-9]{8}'),
                'city_id'=>1
    
            ],

        ]);
       
    }
}
