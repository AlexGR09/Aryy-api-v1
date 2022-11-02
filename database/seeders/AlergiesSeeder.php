<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlergiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('alergies')->insert([
            ['name' => 'Alimentaria'],
            ['name' => 'Fármacos'],
            ['name' => 'Factores ambientales']
        ]);
    }
}
