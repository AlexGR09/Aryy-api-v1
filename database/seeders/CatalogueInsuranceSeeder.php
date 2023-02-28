<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueInsuranceSeeder extends Seeder
{
    public function run()
    {
        DB::table('insurances')->insert([
            ['name' =>  'AIG Seguros México'],
            ['name' =>  'Allianz México'],
            ['name' =>  'AXA Seguros'],
            ['name' =>  'Chubb Seguros México'],
            ['name' =>  'General de Seguros'],
            ['name' =>  'Grupo Mexicano de Seguros'],
            ['name' =>  'Grupo Nacional Provincial (GNP)'],
            ['name' =>  'HDI Seguros'],
            ['name' =>  'Inbursa Seguros'],
            ['name' =>  'Mapfre México'],
            ['name' =>  'MetLife México'],
            ['name' =>  'Quálitas'],
            ['name' =>  'RSA Seguros México'],
            ['name' =>  'Seguros Atlas'],
            ['name' =>  'Seguros Banca Afirme'],
            ['name' =>  'Seguros Banca Mifel'],
            ['name' =>  'Seguros BanCoppel'],
            ['name' =>  'Seguros Banjercito'],
            ['name' =>  'Seguros BBVA'],
            ['name' =>  'Seguros GNP Fuerza Vital'],
            ['name' =>  'Seguros HSBC'],
            ['name' =>  'Seguros Inbursa'],
            ['name' =>  'Seguros Interacciones'],
            ['name' =>  'Seguros Liverpool'],
            ['name' =>  'Seguros Monterrey'],
            ['name' =>  'Seguros Santander'],
            ['name' =>  'Zurich Seguros'],
        ]);
    }
}
