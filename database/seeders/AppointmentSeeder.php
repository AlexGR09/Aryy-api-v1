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
                'user_id' => 3,
                'physician_id' => 1,
                'specialty_id' => 1,
                'appointment_date' => now(),
                'address' => 'chemsito',
                'status' => 'attended', 
            ]); 
        }
    }
}
