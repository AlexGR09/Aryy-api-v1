<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OcupationSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('ocupations')->insert([
            ['name'=>'Bombero'],
            ['name'=>'Dentista'],
            ['name'=>'Enfermera'],
            ['name'=>'Arquitecto'],
            ['name'=>'Maestro']
        ]);
    }
}
