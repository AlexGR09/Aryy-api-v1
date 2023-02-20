<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueCountrySeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->insert([
            ['name' => 'México'],
            ['name' => 'Estados Unidos'],
            ['name' => 'Canadá'],
            ['name' => 'Japón'],
            ['name' => 'China'],
            ['name' => 'Brasil'],
        ]);
    }
}
