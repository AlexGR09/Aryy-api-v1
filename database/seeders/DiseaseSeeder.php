<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Acupuntor
        $diseases  = Disease::create(["name"=>"Fibromialgia"]);
        $diseases2 = Disease::create(["name"=>"Dolores de cabeza"]);
        $diseases3 = Disease::create(["name"=>"Artrosis"]);
        $diseases4 = Disease::create(["name"=>"Codo de tenista"]);
        $diseases5 = Disease::create(["name"=>"Dolor de cuello"]);

        //Cardiólogo
        $diseases6  = Disease::create(["name"=>"Infarto de miocardio"]);
        $diseases7  = Disease::create(["name"=>"Angina de pecho"]);
        $diseases8  = Disease::create(["name"=>"Hipertensión arterial"]);
        $diseases9  = Disease::create(["name"=>"Insuficiencia cardíaca"]);
        $diseases10 = Disease::create(["name"=>"Trastornos del ritmo cardíaco"]);

        //Dermatólogo
        $diseases11  = Disease::create(["name"=>"Infarto de miocardio"]);
        $diseases12  = Disease::create(["name"=>"Angina de pecho"]);
        $diseases13  = Disease::create(["name"=>"Hipertensión arterial"]);
        $diseases14  = Disease::create(["name"=>"Insuficiencia cardíaca"]);
        $diseases15  = Disease::create(["name"=>"Trastornos del ritmo cardíaco"]);
    }
}
