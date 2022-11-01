<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        // $this->call(CitySeederJson::class);
        $this->call(AlergiesSeeder::class);
        $this->call(OcupationSeeder::class);
        $this->call(InsuranceSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(SubSpecialtySeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(MedicalServiceSeeder::class);
        $this->call(MedicalHistorySeeder::class);
    }
}
