<?php

namespace Database\Seeders;

use App\Models\MedicalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalServiceSeeder extends Seeder
{
    
    public function run()
    {
        \DB::table('medical_services')->insert([
            // Servicos de Acupuntor
            ['name'=>'Homotoxicología'],
            ['name'=>'Ozonoterapia'],
            ['name'=>'Hidroterapia de colon'],
            ['name'=>'Control de sobrepeso'],
            ['name'=>'Medicina Integrativa'],
            // Servicos de Cardiólogo
            ['name'=>'Ecocardiografía Farmacológica'],
            ['name'=>'Prueba de Esfuerzo'],
            ['name'=>'Ecocardiograma Transtorácico'],
            ['name'=>'Cateterización cardíaca'],
            ['name'=>'Colocación de endoprótesis'],
            // Servicos de Dermatólogo
            ['name'=>'Tratamiento de rayos ultravioleta B y A1 de banda estrecha'],
            ['name'=>'Prueba de Esfuerzo'],
            ['name'=>'Extirpación quirúrgica'],
            ['name'=>'Lesiones de la piel'],
            ['name'=>'Pérdida de cabello'],
            // Servicos de Endocrinólogo
            ['name'=>'Pruebas del nivel de azúcar en la sangre'],
            ['name'=>'Exploración de los huesos'],
            ['name'=>'Reemplazo de hormonas'],
            ['name'=>'Control médico'],
            ['name'=>'Control con la bomba de insulina'],
            // Servicos de Ginecólogo
            ['name'=>'Papanicolau'],
            ['name'=>'Mamografía'],
            ['name'=>'Colposcopia'],
            ['name'=>'Histeroscopia'],
            ['name'=>'Laparoscopia pélvica']
        ]);
    }
}
