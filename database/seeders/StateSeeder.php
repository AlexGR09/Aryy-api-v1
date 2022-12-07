<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    public function run()
    {
        DB::table('states')->insert([

            [
                'name' => 'Aguascalientes',
                'short_name' => 'AGS',
                'country_id' => 1,
            ],
            [
                'name' => 'Baja California',
                'short_name' => 'BC',
                'country_id' => 1,
            ],
            [
                'name' => 'Baja California Sur',
                'short_name' => 'BCS',
                'country_id' => 1,
            ],
            [
                'name' => 'Campeche',
                'short_name' => 'CMP',
                'country_id' => 1,
            ],
            [
                'name' => 'Chiapas',
                'short_name' => 'CHS',
                'country_id' => 1,
            ],
            [
                'name' => 'Chihuahua',
                'short_name' => 'CHI',
                'country_id' => 1,
            ],
            [
                'name' => 'Ciudad de México',
                'short_name' => 'CMX',
                'country_id' => 1,
            ],
            [
                'name' => 'Coahuila',
                'short_name' => 'COA',
                'country_id' => 1,
            ],
            [
                'name' => 'Colima',
                'short_name' => 'COL',
                'country_id' => 1,
            ],
            [
                'name' => 'Durango',
                'short_name' => 'DGO',
                'country_id' => 1,
            ],
            [
                'name' => 'Estado de México ',
                'short_name' => 'MEX',
                'country_id' => 1,
            ],
            [
                'name' => 'Guanajuato ',
                'short_name' => 'GTO',
                'country_id' => 1,
            ],
            [
                'name' => 'Guerrero ',
                'short_name' => 'GRO',
                'country_id' => 1,
            ],
            [
                'name' => 'Hidalgo ',
                'short_name' => 'HGO',
                'country_id' => 1,
            ],
            [
                'name' => 'Jalisco ',
                'short_name' => 'JAL',
                'country_id' => 1,
            ],
            [
                'name' => 'Michoacán',
                'short_name' => 'MCH',
                'country_id' => 1,
            ],
            [
                'name' => 'Morelos ',
                'short_name' => 'MOR',
                'country_id' => 1,
            ],
            [
                'name' => 'Nayarit ',
                'short_name' => 'NAY',
                'country_id' => 1,
            ],
            [
                'name' => 'Nuevo León',
                'short_name' => 'NL',
                'country_id' => 1,
            ],
            [
                'name' => 'Oaxaca',
                'short_name' => 'OAX',
                'country_id' => 1,
            ],
            [
                'name' => 'Puebla',
                'short_name' => 'PUE',
                'country_id' => 1,
            ],
            [
                'name' => 'Querétaro',
                'short_name' => 'QRO',
                'country_id' => 1,
            ],
            [
                'name' => 'Quintana Roo',
                'short_name' => 'QR',
                'country_id' => 1,
            ],
            [
                'name' => 'San Luis Potosí',
                'short_name' => 'SLP',
                'country_id' => 1,
            ],
            [
                'name' => 'Sinaloa',
                'short_name' => 'SIN',
                'country_id' => 1,
            ],
            [
                'name' => 'Sonora',
                'short_name' => 'SON',
                'country_id' => 1,
            ],
            [
                'name' => 'Tabasco',
                'short_name' => 'TAB',
                'country_id' => 1,
            ],
            [
                'name' => 'Tamaulipas',
                'short_name' => 'TMS',
                'country_id' => 1,
            ],
            [
                'name' => 'Tlaxcala',
                'short_name' => 'TLX',
                'country_id' => 1,
            ],
            [
                'name' => 'Veracruz',
                'short_name' => 'VER',
                'country_id' => 1,
            ],
            [
                'name' => 'Yucatán',
                'short_name' => 'YUC',
                'country_id' => 1,
            ],
            [
                'name' => 'Zacatecas',
                'short_name' => 'ZAC',
                'country_id' => 1,
            ],

        ]);
    }
}
