<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalAppointmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('medical_appointments')->insert([
            [
                'appointment_date' => '2023-02-17',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 10,
                'patient_id' => 1,
                'facility_id' => 2,
                'prescription_id' => null,
            ],
            [
                'appointment_date' => '2023-01-01',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de segunda vez',
                'physician_id' => 10,
                'patient_id' => 2,
                'facility_id' => 10,
                'prescription_id' => 2,
            ],
            [
                'appointment_date' => '2023-01-10',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 3,
                'patient_id' => 3,
                'facility_id' => 3,
                'prescription_id' => 3,
            ],
            [
                'appointment_date' => '2023-01-10',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 4,
                'patient_id' => 4,
                'facility_id' => 4,
                'prescription_id' => 4,
            ],
            [
                'appointment_date' => '2023-01-25',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 10,
                'patient_id' => 5,
                'facility_id' => 10,
                'prescription_id' => 5,
            ],
            [
                'appointment_date' => '2023-01-30',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 4,
                'patient_id' => 6,
                'facility_id' => 4,
                'prescription_id' => 6,
            ],
            [
                'appointment_date' => '2023-02-07',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 4,
                'patient_id' => 7,
                'facility_id' => 4,
                'prescription_id' => 7,
            ],
            [
                'appointment_date' => '2023-02-07',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 10,
                'patient_id' => 8,
                'facility_id' => 10,
                'prescription_id' => 8,
            ],
            [
                'appointment_date' => '2023-02-17',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 1,
                'patient_id' => 9,
                'facility_id' => 1,
                'prescription_id' => 9,
            ],
            [
                'appointment_date' => '2023-02-10',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta test',
                'physician_id' => 1,
                'patient_id' => 10,
                'facility_id' => 1,
                'prescription_id' => 10,
            ],
        ]);
    }
}
