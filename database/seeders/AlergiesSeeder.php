<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlergiesSeeder extends Seeder
{
    public function run()
    {
        \DB::table('alergies')->insert([
            ['name' => 'Alimentaria'],
            ['name' => 'Fármacos'],
            ['name' => 'Factores ambientales']
        ]);
    }
}
