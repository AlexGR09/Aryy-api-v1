<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 9 ; $i <= 18; $i++){ 
            Appointment::create([
                'user_id_physician' => 3,
                'user_id_patient' => 22,
                'specialty_id' => 1,
                'appointment_date' => now()->addDays(7),
                'address' => 'chemsito',
                'status' => 'attended', 
            ]); 
        }
    }
}
