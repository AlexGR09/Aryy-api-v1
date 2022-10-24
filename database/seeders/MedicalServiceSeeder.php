<?php

namespace Database\Seeders;

use App\Models\MedicalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //servicos de Acupuntor
        $medical_service = MedicalService::create(["name"=>"Homotoxicología"]);
        $medical_service2 = MedicalService::create(["name"=>"Ozonoterapia"]);
        $medical_service3 = MedicalService::create(["name"=>"Hidroterapia de colon"]);
        $medical_service4 = MedicalService::create(["name"=>"Control de sobrepeso"]);
        $medical_service5 = MedicalService::create(["name"=>"Medicina Integrativa"]);

        //servicos de Cardiólogo
        $medical_service6  = MedicalService::create(["name"=>"Ecocardiografía Farmacológica"]);
        $medical_service7  = MedicalService::create(["name"=>"Prueba de Esfuerzo"]);
        $medical_service8  = MedicalService::create(["name"=>"Ecocardiograma Transtorácico"]);
        $medical_service9  = MedicalService::create(["name"=>"Cateterización cardíaca"]);
        $medical_service10 = MedicalService::create(["name"=>"Colocación de endoprótesis"]);

        //servicos de Dermatólogo
        $medical_service11 = MedicalService::create(["name"=>"Tratamiento de rayos ultravioleta B y A1 de banda estrecha"]);
        $medical_service12 = MedicalService::create(["name"=>"Prueba de Esfuerzo"]);
        $medical_service13 = MedicalService::create(["name"=>"Extirpación quirúrgica"]);
        $medical_service14 = MedicalService::create(["name"=>"Lesiones de la piel"]);
        $medical_service15 = MedicalService::create(["name"=>"Pérdida de cabello"]);

         //servicos de Endocrinólogo
         $medical_service16 = MedicalService::create(["name"=>"Pruebas del nivel de azúcar en la sangre"]);
         $medical_service17 = MedicalService::create(["name"=>"Exploración de los huesos"]);
         $medical_service18 = MedicalService::create(["name"=>"Reemplazo de hormonas"]);
         $medical_service19 = MedicalService::create(["name"=>"Control médico"]);
         $medical_service20 = MedicalService::create(["name"=>"Control con la bomba de insulina"]);

         //servicos de Ginecólogo
         $medical_service16 = MedicalService::create(["name"=>"Papanicolau"]);
         $medical_service17 = MedicalService::create(["name"=>"Mamografía"]);
         $medical_service18 = MedicalService::create(["name"=>"Colposcopia"]);
         $medical_service19 = MedicalService::create(["name"=>"Histeroscopia"]);
         $medical_service20 = MedicalService::create(["name"=>"Laparoscopia pélvica"]);
    }
}
