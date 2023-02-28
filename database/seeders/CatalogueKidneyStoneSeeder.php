<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueKidneyStoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kidney_stones')->insert([
            [
                'id' => 1,
                'name' => 'Acidosis tubular renal'
            ],
            [
                'id' => 2,
                'name' => 'Cólico renal'
            ],
            [
                'id' => 3,
                'name' => 'Enfermedad renal poliquística'
            ],
            [
                'id' => 4,
                'name' => 'Estenosis ureteral'
            ],
            [
                'id' => 5,
                'name' => 'Hipercalciuria idiopática'
            ],
            [
                'id' => 6,
                'name' => 'Hiperparatiroidismo'
            ],
            [
                'id' => 7,
                'name' => 'Infección urinaria'
            ],
            [
                'id' => 8,
                'name' => 'Nefrolitiasis'
            ],
            [
                'id' => 9,
                'name' => 'Síndrome de Cushing'
            ],
            [
                'id' => 10,
                'name' => 'Síndrome de Lesch-Nyhan'
            ],
        ]);
    }
}
