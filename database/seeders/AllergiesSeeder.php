<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('allergies')->insert([
            [
                'name' => 'Alergia al huevo',
            ],
            [
                'name' => 'Alergia al pescado',
            ],
            [
                'name' => 'Alergia a la leche',
            ],
            [
                'name' => 'Alergia al maníe',
            ],
            [
                'name' => 'Alergia a los mariscos'
            ],
            [
                'name' => 'Alergia a la soya o soja',
            ],
            [
                'name' => 'Alergia a las nueces',
            ],
            [
                'name' => 'Alergia al trigo',
            ],
            [
                'name' => 'Alergia al polen'
            ],
            [
                'name' => 'Alergia al moho'
            ],
            [
                'name' => 'Alergia al polvo'
            ],
            [
                'name' => 'Alergia a la caspa'
            ],
            [
                'name' => 'Alergia a anticonvulsivos'
            ],
            [
                'name' => 'Alergia a la insulina'
            ],
            [
                'name' => 'Alergia al yodo'
            ],
            [
                'name' => 'Alergia a la penicilina'
            ],
            [
                'name' => 'Alergia a antibióticos conexos'
            ],
            [
                'name' => 'Alergia a sulfamidas'
            ]
        ]);
    }
}
