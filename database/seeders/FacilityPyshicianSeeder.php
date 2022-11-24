<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityPyshicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facility_physician')->insert([
            [
                'facility_id' => 1,
                'physician_id' => 1,
            ],
            [
                'facility_id' => 2,
                'physician_id' => 2,
            ],
            [
                'facility_id' => 3,
                'physician_id' => 3,
            ],
            [
                'facility_id' => 4,
                'physician_id' => 4,
            ],
            [
                'facility_id' => 5,
                'physician_id' => 5,
            ],
            //
            [
                'facility_id' => 6,
                'physician_id' => 6,
            ],
            [
                'facility_id' => 7,
                'physician_id' => 7,
            ],
            [
                'facility_id' => 8,
                'physician_id' => 8,
            ],
            [
                'facility_id' => 9,
                'physician_id' => 9,
            ],
            [
                'facility_id' => 10,
                'physician_id' => 10,
            ],
        ]);
    }
}
