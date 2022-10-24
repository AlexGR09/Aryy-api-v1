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
       $city =  City::create(["name" => "Abasolo", "states_id" =>1]);
       $city2 = City::create(["name" => "Bustamante", "states_id" =>1]);
       $city3 = City::create(["name" => "Cadereyta Jiménez", "states_id" =>1]);
       $city4 = City::create(["name" => "Doctor González", "states_id" =>1]);
       $city5 = City::create(["name" => "San Pedro Garza García", "states_id" =>1]);

       //states->Chiapas
       $city6 = City::create(["name" => "Acala", "states_id" =>2]);
       $city7 = City::create(["name" => "Berriozábal", "states_id" =>2]);
       $city8 = City::create(["name" => "Cacahoatán", "states_id" =>2]);
       $city9 = City::create(["name" => "San Fernando", "states_id" =>2]);
       $city10 = City::create(["name" => "Tuxtla Gutiérrez", "states_id" =>2]);

       //states->San Luis Potosí
       $city11 = City::create(["name" => "Ahualulco", "states_id" =>3]);
       $city12 = City::create(["name" => "Cárdenas", "states_id" =>3]);
       $city13 = City::create(["name" => "Ebano", "states_id" =>3]);
       $city14 = City::create(["name" => "Guadalcázar", "states_id" =>3]);
       $city15 = City::create(["name" => "Moctezuma", "states_id" =>3]);

       //states->Sonora
       $city16 =  City::create(["name" => "Aconchi", "states_id" =>4]);
       $city17 = City::create(["name" => "Bacadéhuachi", "states_id" =>4]);
       $city18 = City::create(["name" => "Caborca", "states_id" =>4]);
       $city19 = City::create(["name" => "Empalme", "states_id" =>4]);
       $city20 = City::create(["name" => "San Felipe de Jesús", "states_id" =>4]);

       //states->Morelos
       $city21 =  City::create(["name" => "Axochiapan", "states_id" =>5]);
       $city22 = City::create(["name" => "Coatlán del Río", "states_id" =>5]);
       $city23 = City::create(["name" => "Emiliano Zapata", "states_id" =>5]);
       $city24 = City::create(["name" => "Huitzilac", "states_id" =>5]);
       $city25 = City::create(["name" => "Huitzilac", "states_id" =>5]);
    }
}
