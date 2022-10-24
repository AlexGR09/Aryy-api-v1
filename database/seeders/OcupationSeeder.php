<?php

namespace Database\Seeders;

use App\Models\Ocupation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OcupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ocupation =  Ocupation::create(["name"=>"Bombero"]);
        $ocupation2 = Ocupation::create(["name"=>"Dentista"]);
        $ocupation3 = Ocupation::create(["name"=>"Enfermera"]);
        $ocupation4 = Ocupation::create(["name"=>"Arquitecto"]);
        $ocupation5 = Ocupation::create(["name"=>"Maestro"]);
    }
}
