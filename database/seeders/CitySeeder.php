<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //states->Nuevo León
       $city =  City::create(["name" => "Abasolo", "state_id" =>1]);
       $city2 = City::create(["name" => "Bustamante", "state_id" =>1]);
       $city3 = City::create(["name" => "Cadereyta Jiménez", "state_id" =>1]);
       $city4 = City::create(["name" => "Doctor González", "state_id" =>1]);
       $city5 = City::create(["name" => "San Pedro Garza García", "state_id" =>1]);

       //states->Chiapas
       $city6 = City::create(["name" => "Acala", "state_id" =>2]);
       $city7 = City::create(["name" => "Berriozábal", "state_id" =>2]);
       $city8 = City::create(["name" => "Cacahoatán", "state_id" =>2]);
       $city9 = City::create(["name" => "San Fernando", "state_id" =>2]);
       $city10 = City::create(["name" => "Tuxtla Gutiérrez", "state_id" =>2]);

       //states->San Luis Potosí
       $city11 = City::create(["name" => "Ahualulco", "state_id" =>3]);
       $city12 = City::create(["name" => "Cárdenas", "state_id" =>3]);
       $city13 = City::create(["name" => "Ebano", "state_id" =>3]);
       $city14 = City::create(["name" => "Guadalcázar", "state_id" =>3]);
       $city15 = City::create(["name" => "Moctezuma", "state_id" =>3]);

       //states->Sonora
       $city16 =  City::create(["name" => "Aconchi", "state_id" =>4]);
       $city17 = City::create(["name" => "Bacadéhuachi", "state_id" =>4]);
       $city18 = City::create(["name" => "Caborca", "state_id" =>4]);
       $city19 = City::create(["name" => "Empalme", "state_id" =>4]);
       $city20 = City::create(["name" => "San Felipe de Jesús", "state_id" =>4]);

       //states->Morelos
       $city21 =  City::create(["name" => "Axochiapan", "state_id" =>5]);
       $city22 = City::create(["name" => "Coatlán del Río", "state_id" =>5]);
       $city23 = City::create(["name" => "Emiliano Zapata", "state_id" =>5]);
       $city24 = City::create(["name" => "Huitzilac", "state_id" =>5]);
       $city25 = City::create(["name" => "Huitzilac", "state_id" =>5]);
    }
}
