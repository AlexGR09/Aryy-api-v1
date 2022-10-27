<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{

    public function run()
    {
        \DB::table('diseases')->insert([
            // ACUPUNTOR
            ['name' => 'Fibromialgia'],
            ['name'=>'Dolores de cabeza'],
            ['name'=>'Artrosis'],
            ['name'=>'Codo de tenista'],
            ['name'=>'Dolor de cuello'],
            // CARDIÓLOGO
            ['name'=>'Infarto de miocardio'],
            ['name'=>'Angina de pecho'],
            ['name'=>'Hipertensión arterial'],
            ['name'=>'Insuficiencia cardíaca'],
            ['name'=>'Trastornos del ritmo cardíaco'],
            // DERMATÓLOGO
            ['name'=>'Alopecia'],
            ['name'=>'Urticaria'],
            ['name'=>'Dermatitis'],
            ['name'=>'Psoriasis'],
            ['name'=>'Acné'],
            // ENDOCRINÓLOGO
            ['name'=>'Resistencia a la insulina'],
            ['name'=>'Prediabetes'],
            ['name'=>'Diabetes Mellitus'],
            ['name'=>'Acromegalia'],
            ['name'=>'Gigantismo'],
            // GINECÓLOGO
            ['name'=>'Adenomiosis'],
            ['name'=>'Cáncer de cuello uterino'],
            ['name'=>'Diabetes gestacional'],
            ['name'=>'Endometriosis'],
            ['name'=>'Menopausia']
        ]);
    }
}
