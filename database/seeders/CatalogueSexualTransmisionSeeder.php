<?php

namespace Database\Seeders;

use App\Models\CatalogueSexualTransmision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogueSexualTransmisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatalogueSexualTransmision::insert([
            ['name' => 'Balanitis'],
            ['name' => 'Candidiasis'],
            ['name' => 'Candidiasis genital'],
            ['name' => 'Chancroide'],
            ['name' => 'Citomegalovirus (CMV)'],
            ['name' => 'Clamidia'],
            ['name' => 'Donovanosis'],
            ['name' => 'Gonorrea'],
            ['name' => 'Hepatitis B y C'],
            ['name' => 'Herpes genital'],
            ['name' => 'Infecciones bacterianas'],
            ['name' => 'Infecciones parasitarias'],
            ['name' => 'Linfogranuloma venéreo'],
            ['name' => 'Micoplasma genital'],
            ['name' => 'Molluscum contagiosum'],
            ['name' => 'Mycoplasma genitalium'],
            ['name' => 'Pediculosis pubis (ladillas)'],
            ['name' => 'Proctitis por gonorrea o clamidia'],
            ['name' => 'Sífilis'],
            ['name' => 'Tricomoniasis'],
            ['name' => 'Ureaplasma urealyticum'],
            ['name' => 'VIH (virus de inmunodeficiencia humana)'],
            ['name' => 'Virus de la hepatitis D'],
            ['name' => 'VPH (virus del papiloma humano)'],
            ['name' => 'Vulvitis'],
        ]);
    }
}
