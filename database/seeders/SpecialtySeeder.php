<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SpecialtySeeder extends Seeder
{

    public function run()
    {

         //STORAGE/APP/JSON
         $json = Storage::disk('local')->get('/json/specialties.json');
         $data = json_decode($json);
 
         foreach ($data as $obj) {
             \DB::table('specialties')->insert([
                 [
                    'name' => $obj->name,
                 ]
             ]);
            }
    }
}
