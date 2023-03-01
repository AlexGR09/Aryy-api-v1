<?php

namespace Database\Seeders;

use App\Models\CatalogueEnviromentalFactor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogueEnviromentalFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatalogueEnviromentalFactor::insert([
            ['name' => 'Ácaros del polvo'],
            ['name' => 'Calor extremo'],
            ['name' => 'Frio extremo'],
            ['name' => 'Látex'],
            ['name' => 'Moho'],
            ['name' => 'Pelos de animales'],
            ['name' => 'Picaduras de insectos'],
            ['name' => 'Polen'],
            ['name' => 'Productos químicos'],
            ['name' => 'Radiación solar (ej. fotodermatitis)'],
        ]);
    }
}
