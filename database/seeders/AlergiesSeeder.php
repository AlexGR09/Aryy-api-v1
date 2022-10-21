<?php

namespace Database\Seeders;

use App\Models\Alergy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AlergiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $alergies = Alergy::create(["name"=>"Polen"]);
    $alergies2 = Alergy::create(["name"=>"Polvo"]);
    }
}
