<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerinatalBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perinatal_backgrounds')->insert([
            [
                'id' => 1,
                'last_menstrual_cycle'=> '2002-02-01',
                'cycle_time'=> '22 días',
                'contraceptive_method_use'=> 'Ligero',
                'assisted_conception'=> 'Cólicos',
                'final_ppf'=> '2022-12-10'
            ],
            [
                'id' => 2,
                'last_menstrual_cycle'=> '2002-02-01',
                'cycle_time'=> '22 días',
                'contraceptive_method_use'=> 'Ligero',
                'assisted_conception'=> 'Cólicos',
                'final_ppf'=> '2022-12-10'
            ],
        ]);
    }
}
