<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitySeederJson extends Seeder
{
    public function run()
    {
        $json = Storage::disk('local')->get('/json/cities(base).json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            \DB::table('cities')->insert([
                ['name' => $obj->name,
                'state_id' => $obj->state_id]
            ]);
        }
    }
}
