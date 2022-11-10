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
        $json = Storage::disk('local')->get('/json/medical_services_specialties.json');
        $data = json_decode($json);
        $specialty_id = 1;
        foreach ($data as $service) {
            if (is_array($service)) {
                foreach ($service as $medicalservice) {
                    $medical_service = MedicalService::where('name', $medicalservice)->pluck('id')->first();
                        DB::table('medical_services_specialties')->insert([
                            [
                                'medical_service_id' => $medical_service,
                                'specialty_id' => $specialty_id
                            ]
                        ]);
                    
                }
            
            }
            $specialty_id++;
        }
    }
}
