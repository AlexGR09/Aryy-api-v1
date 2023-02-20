<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            ['name' => 'Chino mandarín'],
            ['name' => 'Español'],
            ['name' => 'Inglés'],
            ['name' => 'Hindú'],
            ['name' => 'Árabe'],
            ['name' => 'Portugués'],
            ['name' => 'Bengalí'],
            ['name' => 'Ruso'],
            ['name' => 'Japonés'],
            ['name' => 'Alemán'],
            ['name' => 'Chino Wu'],
            ['name' => 'Coreano'],
            ['name' => 'Francés'],
            ['name' => 'Javanés'],
            ['name' => 'Telugú'],
            ['name' => 'Maratí'],
            ['name' => 'Turco'],
            ['name' => 'Vietnamita'],
            ['name' => 'Tamil'],
            ['name' => 'Italiano'],
        ]);
    }
}
