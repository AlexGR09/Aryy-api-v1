<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueHepatitisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hepatitis')->insert([
            [
                'id' => 1,
                'name' => 'Hepatitis A'
            ],
            [
                'id' => 2,
                'name' => 'Hepatitis B'
            ],
            [
                'id' => 3,
                'name' => 'Hepatitis C'
            ],
            [
                'id' => 4,
                'name' => 'Hepatitis D'
            ],
            [
                'id' => 5,
                'name' => 'Hepatitis E'
            ],
            [
                'id' => 6,
                'name' => 'Hepatitis F'
            ],
            [
                'id' => 7,
                'name' => 'Hepatitis G'
            ],
            [
                'id' => 8,
                'name' => 'Hepatitis alcohólica'
            ],
            [
                'id' => 9,
                'name' => 'Hepatitis autoinmunitaria'
            ],
            [
                'id' => 10,
                'name' => 'Hepatitis medicamentosa'
            ],
            [
                'id' => 11,
                'name' => 'Hepatitis isquémica'
            ],
            [
                'id' => 12,
                'name' => 'Hepatitis por virus de Epstein-Barr'
            ],
        ]);
    }
}
