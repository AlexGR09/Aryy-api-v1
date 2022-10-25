<?php

namespace Database\Seeders;

use App\Models\MedicalHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $history = [
            "campo 1" => "valor 1",
            "campo 2" => "valor 2"
        ];
        $history2 = [
            "campo 3" => "valor 3",
            "campo 4" => "valor 4"
        ];

        $medical_history = MedicalHistory::create([
            "alergies_id" => "1",
            "family_history" => json_encode($history)
        ]);
        $medical_history2 = MedicalHistory::create([
            "alergies_id" => "2",
            "family_history" => json_encode($history2)
        ]);
    }
}
