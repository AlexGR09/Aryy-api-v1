<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StateSeeder extends Seeder
{
    public function run()
    {
        //STORAGE/APP/JSON
        $json = Storage::disk('local')->get('/json/states.json');
        $data = json_decode($json);

        foreach ($data as $obj) {
            \DB::table('states')->insert([
                ['name' => $obj->name,
                'short_name' => $obj->short_name,
                'country_id' => 1]
            ]);
        }
    }
}
