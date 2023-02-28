<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueCancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cancers')->insert([
            [
                'id' => 1,
                'name' => 'Cáncer cervical'
            ],
            [
                'id' => 2,
                'name' => 'Cáncer de cerebro'
            ],
            [
                'id' => 3,
                'name' => 'Cáncer de colon'
            ],[
                'id' => 4,
                'name' => 'Cáncer de estómago'
            ],
            [
                'id' => 5,
                'name' => 'Cáncer de hígado'
            ],
            [
                'id' => 6,
                'name' => 'Cáncer de mama'
            ],
            [
                'id' => 7,
                'name' => 'Cáncer de ovario'
            ],
            [
                'id' => 8,
                'name' => 'Cáncer de páncreas'
            ],
            [
                'id' => 9,
                'name' => 'Cáncer de piel (Melanoma)'
            ],
            [
                'id' => 10,
                'name' => 'Cáncer de próstata'
            ],
            [
                'id' => 11,
                'name' => 'Cáncer de pulmón'
            ],
            [
                'id' => 12,
                'name' => 'Cáncer de tiroides'
            ],
            [
                'id' => 13,
                'name' => 'Cáncer de vejiga'
            ],
            [
                'id' => 14,
                'name' => 'Leucemia'
            ],
            [
                'id' => 15,
                'name' => 'Linfoma'
            ],
        ]);
    }
}
