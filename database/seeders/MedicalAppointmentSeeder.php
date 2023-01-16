<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalAppointmentSeeder extends Seeder
{

    public function run()
    {
        DB::table('medical_appointments')->insert([
            [
                'appointment_date' => '2022-12-22',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 10,
                'patient_id' => 1,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date' => '2020-12-22',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 10,
                'patient_id' => 2,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date' => '2023-01-22',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 10,
                'patient_id' => 3,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date' => '2022-10-22',
                'appointment_time' => '5:00:00',
                'appointment_time_end' => '5:30:00',
                'appointment_type' => 'Consulta de primera vez',
                'physician_id' => 10,
                'patient_id' => 4,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date'=>'2022-12-02',
                'appointment_time'=>'5:00:00',
                'appointment_time_end'=>'5:30:00',
                'appointment_type'=>'Consulta de primera vez',
                'physician_id'=>10,
                'patient_id'=>4,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date'=>'2022-10-05',
                'appointment_time'=>'5:00:00',
                'appointment_time_end'=>'5:30:00',
                'appointment_type'=>'Consulta de primera vez',
                'physician_id'=>10,
                'patient_id'=>4,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date'=>'2022-07-02',
                'appointment_time'=>'5:00:00',
                'appointment_time_end'=>'5:30:00',
                'appointment_type'=>'Consulta de primera vez',
                'physician_id'=>10,
                'patient_id'=>4,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date'=>'2023-10-01',
                'appointment_time'=>'5:00:00',
                'appointment_time_end'=>'5:30:00',
                'appointment_type'=>'Consulta de primera vez',
                'physician_id'=>10,
                'patient_id'=>4,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date'=>'2023-10-22',
                'appointment_time'=>'5:00:00',
                'appointment_time_end'=>'5:30:00',
                'appointment_type'=>'Consulta de primera vez',
                'physician_id'=>10,
                'patient_id'=>4,
                'facility_id' => 10,
                'status' => 'scheduled',
            ],
            [
                'appointment_date'=>'2022-12-28',
                'appointment_time'=>'5:00:00',
                'appointment_time_end'=>'5:30:00',
                'appointment_type'=>'Consulta de primera vez',
                'physician_id'=>10,
                'patient_id'=>4,
                'facility_id' => 10,
                'status' => 'scheduled',
            ]
        ]);
    }
}
