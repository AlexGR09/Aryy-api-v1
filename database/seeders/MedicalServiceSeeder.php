<?php

namespace Database\Seeders;

use App\Models\MedicalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MedicalServiceSeeder extends Seeder
{

    public function run()
    {
        $json = Storage::disk('local')->get('/json/medical_service.json');
        $data = json_decode($json,true);
        $array = array_unique($data,SORT_STRING);

        foreach ($array as $obj) {
            DB::table('medical_services')->insert([
                [
                   'name' => $obj,
                ]
            ]);
           }
    }
}
