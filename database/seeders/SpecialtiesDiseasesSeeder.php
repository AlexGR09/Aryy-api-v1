<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SpecialtiesDiseasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //STORAGE/APP/JSON
        $json = Storage::disk('local')->get('/json/specialties_diseases.json');
        $data = json_decode($json);
        
       /*  $disease_id = 1; */
        $specialty_id = 1;
        foreach ($data as $specialty_disease) {
            if (is_array($specialty_disease)) {
                foreach ($specialty_disease as $specialties_diseases) {
                    DB::table('specialties_diseases')->insert([
                        [
                            'specialty_id' => $specialty_id,
                            'disease_id' => $specialties_diseases
                        ]
                    ]);
                }
                
            }
            $specialty_id++;
        }
    }
}
