<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    public function run()
    {
        // STORAGE/APP/JSON
        $json = Storage::disk('local')->get('/json/cities.json');
        $data = json_decode($json);
        $state_id = 1;
        foreach ($data as $state) {
            if (is_array($state)) {
                foreach ($state as $city_state) {
                    City::create([
                        'name' => $city_state,
                        'state_id' => $state_id
                    ]);
                }
            }
            $state_id++;
        }
    }
}
