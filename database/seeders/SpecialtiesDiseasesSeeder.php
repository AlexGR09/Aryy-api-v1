<?php

namespace Database\Seeders;

use App\Models\Disease;
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
        $specialty_id = 1;
        foreach ($data as $disease) {
            if (is_array($disease)) {
                foreach ($disease as $diseases) {
                    $enfermedad = Disease::where('name', $diseases)->pluck('id')->first();
                        DB::table('specialty_disease')->insert([
                            [
                                'disease_id' => $enfermedad,
                                'specialty_id' => $specialty_id
                            ]
                        ]);
                    
                }
            
            }
            $specialty_id++;
        }

    }
}
