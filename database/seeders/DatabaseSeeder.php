<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AlergiesSeeder::class);
        $this->call(OcupationSeeder::class);
        $this->call(InsuranceSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(MedicalServiceSeeder::class);
        $this->call(MedicalHistorySeeder::class);
    }
}
