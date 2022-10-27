<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurance = Insurance::create(["name" => "Medicaid"]);
        $insurance2 = Insurance::create(["name" => "Mapfre"]);
        $insurance3 = Insurance::create(["name" => "Seguros banorte"]);
        $insurance4 = Insurance::create(["name" => "Metlife"]);
        $insurance5 = Insurance::create(["name" => "Allianz Seguros"]);
    }
}
