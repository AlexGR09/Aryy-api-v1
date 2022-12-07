<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationSeeder extends Seeder
{

    public function run()
    {
        DB::table('occupations')->insert([
            [
                'name' => ' '
            ],
            [
                'name' => 'Abogado'
            ],
            [
                'name' => 'Ingeniero'
            ],
            [
                'name' => 'Biólogo'
            ],
            [
                'name' => 'Contador'
            ],
            [
                'name' => 'Arquitecto'
            ],
            [
                'name' => 'Periodista'
            ],
            [
                'name' => 'Psicologo'
            ],
            [
                'name' => 'Botánico'
            ],
            [
                'name' => 'Farmacólogo'
            ],
            [
                'name' => 'Cajero'
            ],
            [
                'name' => 'Policía'
            ],
            [
                'name' => 'Panadero'
            ],
            [
                'name' => 'Escritor'
            ],
            [
                'name' => 'Locutor'
            ],
            [
                'name' => 'Carnicero',
            ],
            [
                'name' => 'Albañil'
            ],
            [
                'name' => 'Editor'
            ],
            [
                'name' => 'Cocinero'
            ],
            [
                'name' => 'Agricultor'
            ],
            [
                'name' => 'Soldador'
            ],
            [
                'name' => 'Sastre'
            ],
            [
                'name' => 'Plomero'
            ],
            [
                'name' => 'Pescador'
            ],
            [
                'name' => 'Mecanico'
            ],
            [
                'name' => 'Músico'
            ],
            [
                'name' => 'Traductor'
            ],
            [
                'name' => 'Carpintero'
            ],
            [
                'name' => 'Cerrajero'
            ],
            [
                'name' => 'Sastre'
            ],
            [
                'name' => 'Minero'
            ]
        ]);
    }
}
