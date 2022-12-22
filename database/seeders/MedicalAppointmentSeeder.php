<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_appointments')->insert([
            [
                'appointment_date'=>'2022-12-22',
                'appointment_time'=>'5:00:00',
                'appointment_type'=>'Consulta de primera vez',
                'phone_number'=>'1234567989',
                'emergency_number'=>'1234567555',
                'physician_id'=>10,
                'patient_id'=>1,
            ],
            [
                'appointment_date'=>'2020-12-22',
                'appointment_time'=>'5:00:00',
                'appointment_type'=>'Consulta de primera vez',
                'phone_number'=>'1234567989',
                'emergency_number'=>'1234567555',
                'physician_id'=>10,
                'patient_id'=>1,
            ],
            [
                'appointment_date'=>'2023-01-22',
                'appointment_time'=>'5:00:00',
                'appointment_type'=>'Consulta de primera vez',
                'phone_number'=>'1234567989',
                'emergency_number'=>'1234567555',
                'physician_id'=>10,
                'patient_id'=>1,
            ],[
                'appointment_date'=>'2022-10-22',
                'appointment_time'=>'5:00:00',
                'appointment_type'=>'Consulta de primera vez',
                'phone_number'=>'1234567989',
                'emergency_number'=>'1234567555',
                'physician_id'=>10,
                'patient_id'=>1,
            ]
        ]);
    }
}
