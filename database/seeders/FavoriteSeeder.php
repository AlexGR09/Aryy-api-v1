<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
            [
                'patient_id' => 1,
                'physician_id' => 1,
            ],
            [
                'patient_id' => 2,
                'physician_id' => 1,
            ],
            [
                'patient_id' => 3,
                'physician_id' => 3,
            ],
            [
                'patient_id' => 4,
                'physician_id' => 1,
            ],
            [
                'patient_id' => 5,
                'physician_id' => 3,
            ],
            [
                'patient_id' => 6,
                'physician_id' => 6,
            ],
            [
                'patient_id' => 7,
                'physician_id' => 8,
            ],
            [
                'patient_id' => 8,
                'physician_id' => 8,
            ],
            [
                'patient_id' => 9,
                'physician_id' => 9,
            ],
            [
                'patient_id' => 10,
                'physician_id' => 10,
            ],
        ]);
    }
}
