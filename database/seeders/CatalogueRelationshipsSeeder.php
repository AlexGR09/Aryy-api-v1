<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationships')->insert([
            ['name' => 'Abuela / Abuelo'],
            ['name' => 'Madre / Padre'],
            ['name' => 'Hermana / Hermano'],
            ['name' => 'Esposa / Esposo'],
            ['name' => 'Hija / Hijo'],
            ['name' => 'Amigo / Amigo'],
        ]);
    }
}
