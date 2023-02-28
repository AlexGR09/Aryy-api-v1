<?php

namespace Database\Seeders;

use App\Models\CatalogueAlimentaryAllergy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogueAlimentaryAllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $catelogueAlimentaryAllergy = [
            ['name' => 'Apio'],
            ['name' => 'Cacahuates'],
            ['name' => 'Frutos rojos'],
            ['name' => 'Frutos secos'],
            ['name' => 'Gluten (enfermedad celíaca)'],
            ['name' => 'Huevos'],
            ['name' => 'Látex de frutas y verduras'],
            ['name' => 'Leche'],
            ['name' => 'Maíz'],
            ['name' => 'Mariscos'],
            ['name' => 'Mostaza'],
            ['name' => 'Pescado'],
            ['name' => 'Pimientos'],
            ['name' => 'Polen de abeja'],
            ['name' => 'Sésamo'],
            ['name' => 'Soya'],
            ['name' => 'Sulfitos'],
            ['name' => 'Tomates'],
            ['name' => 'Trigo'],
            ['name' => 'Zanahorias'],
        ];
        CatalogueAlimentaryAllergy::insert($catelogueAlimentaryAllergy);
    }
}
