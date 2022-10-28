<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //STORAGE/APP/JSON
        $json = Storage::disk('local')->get('/json/subspecialties.json');
        $data = json_decode($json);
        $specialty_id = 1;
        foreach ($data as $specialty) {
            if(is_array($specialty)){
                foreach ($specialty as $sub_specialty) {
                    DB::table('sub_specialties')->insert([
                        ['name' => $sub_specialty,
                        'specialty_id' => $specialty_id ]
                    ]);
                }
            }
            $specialty_id++;
        }
    }
}
