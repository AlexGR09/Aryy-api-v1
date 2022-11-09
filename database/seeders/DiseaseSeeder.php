<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiseaseSeeder extends Seeder
{

    public function run()
    {
        $json = Storage::disk('local')->get('/json/diseases.json');
        $data = json_decode($json,true);
        $array = array_unique($data,SORT_STRING);

        foreach ($array as $obj) {
            DB::table('diseases')->insert([
                [
                   'name' => $obj,
                ]
            ]);
           }

       
    }
}