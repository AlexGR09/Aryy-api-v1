<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        $json = Storage::disk('local')->get('/json/cities.json');
        $data = json_decode($json);
        $state_id = 1;
        foreach ($data as $state) {
                foreach ($state as $city_state) {
                    DB::table('cities')->insert([
                        ['name' => $city_state,
                        'state_id' => $state_id ]
                    ]);
                }
            $state_id++;
        }
    }
}
