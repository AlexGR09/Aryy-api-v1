<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('insurances')->insert([
            ['name' => 'Medicaid'],
            ['name' => 'Mapfre'],
            ['name' => 'Seguros banorte'],
            ['name' => 'Metlife'],
            ['name' => 'Allianz Seguros']
        ]);
    }
}
