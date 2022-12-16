<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KinshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kinships')->insert([
            ['name' => 'Abuelos maternos'],
            ['name' => 'Abuelos paternos'],
            ['name' => 'Mamá'],
            ['name' => 'Papá'],
            ['name' => 'Tíos maternos'],
            ['name' => 'Tíos paternos'],
            ['name' => 'Sobrinos'],
            ['name' => 'Hermana / Hermano'],
            ['name' => 'Primos meternos'],
            ['name' => 'Primos paternos'],
        ]);
    }
}
