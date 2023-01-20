<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PillReminderSeeder extends Seeder
{
    public function run()
    {
        DB::table('pill_reminders')->insert([
            [
                'id' => 1,
                'patient_id' => 1,
                'drug' => 'paracetamol',
                'doce' => '1',
                'frecuency' => '8 hrs',
                'start_treatment' => '2023-01-17',
                'end_treatment' => '2023-01-24',
                'instruction' => 'junto con los alimentos',
                'status' => 'pending',
            ],
            [
                'id' => 2,
                'patient_id' => 1,
                'drug' => 'amoxicilina',
                'doce' => '5 ml',
                'frecuency' => '12 hrs',
                'start_treatment' => '2023-01-17',
                'end_treatment' => '2023-01-24',
                'instruction' => 'después los alimentos',
                'status' => 'pending',
            ],
            [
                'id' => 3,
                'patient_id' => 2,
                'drug' => 'paracetamol',
                'doce' => '1',
                'frecuency' => '8 hrs',
                'start_treatment' => '2023-01-17',
                'end_treatment' => '2023-01-24',
                'instruction' => 'junto con los alimentos',
                'status' => 'pending',
            ],
            [
                'id' => 4,
                'patient_id' => 2,
                'drug' => 'amoxicilina',
                'doce' => '5 ml',
                'frecuency' => '12 hrs',
                'start_treatment' => '2023-01-17',
                'end_treatment' => '2023-01-24',
                'instruction' => 'después los alimentos',
                'status' => 'pending',
            ],
        ]);
    }
}
