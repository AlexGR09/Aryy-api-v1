<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $speciality  = Speciality::create(["name" => "Acupuntor"]);
        $speciality2 = Speciality::create(["name" => "Cardiólogo"]);
        $speciality3 = Speciality::create(["name" => "Dermatólogo"]);
        $speciality4 = Speciality::create(["name" => "Endocrinólogo"]);
        $speciality5 = Speciality::create(["name" => "Ginecólogo"]);
    }
}