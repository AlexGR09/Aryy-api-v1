<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    
    public function run()
    {
        $history1 = [
            "campo 1" => "valor 1",
            "campo 2" => "valor 2"
        ];
        $history2 = [
            "campo 3" => "valor 3",
            "campo 4" => "valor 4"
        ];

        \DB::table('medical_histories')->insert([
            [
                'alergies_id' => 1,
                'family_history' => json_encode($history1) 
            ],
            [
                'alergies_id' => 2,
                'family_history' => json_encode($history2) 
            ]
        ]);
    }
}
