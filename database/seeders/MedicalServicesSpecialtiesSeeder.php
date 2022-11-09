<?php

namespace Database\Seeders;

use App\Models\MedicalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MedicalServicesSpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/specialtie.json');
        $data = json_decode($json);
        $specialty_id = 1;
        foreach ($data as $disease) {
            if (is_array($disease)) {
                foreach ($disease as $diseases) {
                    $enfermedad = MedicalService::where('name', $diseases)->pluck('id')->first();
                        DB::table('specialties_diseases')->insert([
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
