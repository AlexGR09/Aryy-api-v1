<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObstetricGynecologicalBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obstetric_gynecological_backgrounds')->insert([
            [
                'id' => 1,
                'first_menstruation'=> '2002-02-01',
                'last_menstruation'=> '2022-12-10',
                'bleeding'=> 'Ligero',
                'pain'=> 'Cólicos',
                'intimate_hygiene'=> 'Tampón',
                'cervical_discharge'=> 'Atípico',
                'sex'=> 'Coito interrumpido',
                'pregnancies'=> 'No se',
                'cervical_cancer'=> 'No se',
                'breast_cancer'=> 'No se',
                'sexually_active'=> 'No',
                'family_planning'=> 'No',
                'hormone_replacement_therapy'=> 'No se',
                'last_pap_smear'=> '2022-12-22',
                'last_mammography'=> '2022-12-20'
            ],
            [
                'id' => 2,
                'first_menstruation'=> '2002-02-01',
                'last_menstruation'=> '2022-12-10',
                'bleeding'=> 'Ligero',
                'pain'=> 'Cólicos',
                'intimate_hygiene'=> 'Tampón',
                'cervical_discharge'=> 'Atípico',
                'sex'=> 'Coito interrumpido',
                'pregnancies'=> 'No se',
                'cervical_cancer'=> 'No se',
                'breast_cancer'=> 'No se',
                'sexually_active'=> 'No',
                'family_planning'=> 'No',
                'hormone_replacement_therapy'=> 'No se',
                'last_pap_smear'=> '2022-12-22',
                'last_mammography'=> '2022-12-20'
            ],


        ]);
    }
}
