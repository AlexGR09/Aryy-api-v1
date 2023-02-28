<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueBloodDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_diseases')->insert([
            [
                'id' => 1,
                'name' => 'Anemia'
            ],
            [
                'id' => 2,
                'name' => 'Enfermedad de células falciformes'
            ],
            [
                'id' => 3,
                'name' => 'Enfermedad de Von Willebrand'
            ],
            [
                'id' => 4,
                'name' => 'Hemofilia'
            ],
            [
                'id' => 5,
                'name' => 'Leucemia'
            ],
            [
                'id' => 6,
                'name' => 'Linfoma'
            ],
            [
                'id' => 7,
                'name' => 'Mieloma múltiple'
            ],
            [
                'id' => 8,
                'name' => 'Policitemia vera'
            ],
            [
                'id' => 9,
                'name' => 'Púrpura trombocitopénica idiopática (PTI)'
            ],
            [
                'id' => 10,
                'name' => 'Talasemia'
            ],
        ]);
    }
}
