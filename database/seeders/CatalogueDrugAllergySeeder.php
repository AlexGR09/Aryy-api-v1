<?php

namespace Database\Seeders;

use App\Models\CatalogueDrugAllergy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogueDrugAllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatalogueDrugAllergy::insert( [
            ['name' =>  'Anestésicos generales'],
            ['name' =>  'Anestésicos locales'],
            ['name' =>  'Anticonvulsivantes'],
            ['name' =>  'Antidepresivos'],
            ['name' =>  'Antiinflamatorios'],
            ['name' =>  'Aspirina'],
            ['name' =>  'Barbitúricos'],
            ['name' =>  'Insulina'],
            ['name' =>  'Medicamentos antipsicóticos'],
            ['name' =>  'Medicamentos para el VIH/SIDA.'],
            ['name' =>  'Medicamentos para la artritis'],
            ['name' =>  'Medicamentos para la epilepsia'],
            ['name' =>  'Medicamentos para la presión arterial'],
            ['name' =>  'Medicamentos para la tiroides'],
            ['name' =>  'Opiáceos'],
            ['name' =>  'Otros antibióticos'],
            ['name' =>  'Penicilina'],
            ['name' =>  'Quimioterapia'],
            ['name' =>  'Radiología de contraste'],
            ['name' =>  'Vacunas']
        ]);
    }
}
