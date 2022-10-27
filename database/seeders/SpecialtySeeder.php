<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{

    public function run()
    {
        \DB::table('specialties')->insert([
            ['name'=>'Acupuntor'],
            ['name'=>'Cardiólogo'],
            ['name'=>'Dermatólogo'],
            ['name'=>'Endocrinólogo'],
            ['name'=>'Ginecólogo']
        ]);
    }
}
