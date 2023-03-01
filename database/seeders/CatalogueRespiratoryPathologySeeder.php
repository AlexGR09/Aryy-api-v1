<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueRespiratoryPathologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('respiratory_pathologies')->insert([
            [
                'id' => 1,
                'name' => 'Asma'
            ],
            [
                'id' => 2,
                'name' => 'Bronquitis crónica'
            ],
            [
                'id' => 3,
                'name' => 'Cáncer de pulmón de células no pequeñas'
            ],
            [
                'id' => 4,
                'name' => 'Cáncer de pulmón de células pequeñas'
            ],
            [
                'id' => 5,
                'name' => 'Carcinoma broncogénico'
            ],
            [
                'id' => 6,
                'name' => 'Enfermedad de la membrana hialina'
            ],
            [
                'id' => 7,
                'name' => 'Enfermedad pulmonar intersticial'
            ],
            [
                'id' => 8,
                'name' => 'Enfermedad pulmonar obstructiva crónica (EPOC)'
            ],
            [
                'id' => 9,
                'name' => 'Enfisema'
            ],
            [
                'id' => 10,
                'name' => 'Fibrosis quística'
            ],
            [
                'id' => 11,
                'name' => 'Mesotelioma'
            ],
            [
                'id' => 12,
                'name' => 'Metástasis pulmonares'
            ],
            [
                'id' => 13,
                'name' => 'Neumonía'
            ],
            [
                'id' => 14,
                'name' => 'Síndrome de apnea del sueño'
            ],
            [
                'id' => 15,
                'name' => 'Tuberculosis'
            ],
        ]);
    }
}
