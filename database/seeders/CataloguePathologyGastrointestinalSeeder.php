<?php

namespace Database\Seeders;

use App\Models\CataloguePathologyGastrointestinal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CataloguePathologyGastrointestinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pathologicalGastro = [
            ['name' => 'Cáncer colorrectal'],
            ['name' => 'Colelitiasis (cálculos biliares)'],
            ['name' => 'Colitis ulcerosa'],
            ['name' => 'Dispepsia'],
            ['name' => 'Diverticulitis'],
            ['name' => 'Enfermedad celíaca'],
            ['name' => 'Enfermedad de Crohn'],
            ['name' => 'Enfermedad de Hirschsprung'],
            ['name' => 'Enfermedad hepática grasa no alcohólica (EHGNA)'],
            ['name' => 'Enfermedad inflamatoria intestinal (EII)'],
            ['name' => 'Enfermedad por reflujo gastroesofágico (ERGE)'],
            ['name' => 'Hemorroides'],
            ['name' => 'Pancreatitis'],
            ['name' => 'Síndrome del intestino irritable (SII)'],
            ['name' => 'Úlcera gástrica y duodenal']
        ];
        CataloguePathologyGastrointestinal::insert($pathologicalGastro);
    }
}
