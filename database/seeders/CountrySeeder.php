<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{

    public function run()
    {
        DB::table('countries')->insert([
            ['name' => 'México']
        ]);
    }
}
