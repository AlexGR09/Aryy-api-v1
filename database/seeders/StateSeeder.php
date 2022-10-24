<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //contry -> mexico
        $states =  State::create(["name" => "Nuevo León","countries_id" => 1]);
        $states2 = State::create(["name" => "Chiapas","countries_id" => 1]);
        $states3 = State::create(["name" => "San Luis Potosí","countries_id" => 1]);
        $states4 = State::create(["name" => "Sonora","countries_id" => 1]);
        $states5 = State::create(["name" => "Morelos","countries_id" => 1]);
    }
}
