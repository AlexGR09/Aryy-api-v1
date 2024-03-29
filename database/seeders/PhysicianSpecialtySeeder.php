<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhysicianSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('physician_specialty')->insert([
            [
                'specialty_id' => 2,
                'physician_id' => 1,
                'license' => 'CED. PROF. 123456789',
                'institution' => 'UNACH',
            ],
            [
                'specialty_id' => 6,
                'physician_id' => 2,
                'license' => 'CED. PROF. 13585229',
                'institution' => 'UNICAH',
            ],
            [
                'specialty_id' => 15,
                'physician_id' => 3,
                'license' => 'CED. PROF. 987654321',
                'institution' => 'UPS',
            ],
            [
                'specialty_id' => 23,
                'physician_id' => 4,
                'license' => 'CED. PROF. 987654310',
                'institution' => 'UAG',
            ],
            [
                'specialty_id' => 18,
                'physician_id' => 5,
                'license' => 'CED. PROF. 456789123',
                'institution' => 'UAGv',
            ],
            //
            [
                'specialty_id' => 2,
                'physician_id' => 6,
                'license' => 'CED. PROF. 1243456789',
                'institution' => 'UNACH',
            ],
            [
                'specialty_id' => 6,
                'physician_id' => 7,
                'license' => 'CED. PROF. 15555229',
                'institution' => 'UNICAH',
            ],
            [
                'specialty_id' => 15,
                'physician_id' => 8,
                'license' => 'CED. PROF. 987564321',
                'institution' => 'UPS',
            ],
            [
                'specialty_id' => 23,
                'physician_id' => 9,
                'license' => 'CED. PROF. 963258741',
                'institution' => 'UAG',
            ],
            [
                'specialty_id' => 18,
                'physician_id' => 10,
                'license' => 'CED. PROF. 147852369',
                'institution' => 'UAGv',
            ],
        ]);
    }
}
