<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueThyroidDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thyroid_diseases')->insert([
            [
                'id' => 1,
                'name' => 'Bocio'
            ],
            [
                'id' => 2,
                'name' => 'Bocio nodular tóxico'
            ],
            [
                'id' => 3,
                'name' => 'Cáncer de tiroides'
            ],
            [
                'id' => 4,
                'name' => 'Enfermedad de Graves'
            ],
            [
                'id' => 5,
                'name' => 'Hipertiroidismo'
            ],
            [
                'id' => 6,
                'name' => 'Hipotiroidismo'
            ],
            [
                'id' => 7,
                'name' => 'Hipotiroidismo secundario'
            ],
            [
                'id' => 8,
                'name' => 'Nódulos tiroideos'
            ],
            [
                'id' => 9,
                'name' => 'Síndrome del enfermo eutiroideo'
            ],
            [
                'id' => 10,
                'name' => 'Tiroiditis'
            ],
            [
                'id' => 11,
                'name' => 'Tiroiditis de De Quervain'
            ],
            [
                'id' => 12,
                'name' => 'Tiroiditis de Hashimoto'
            ],[
                'id' => 13,
                'name' => 'Tiroiditis posparto'
            ],
            [
                'id' => 14,
                'name' => 'Tiroiditis subaguda'
            ],
            [
                'id' => 15,
                'name' => 'Tormenta tiroidea'
            ],

        ]);
    }
}
