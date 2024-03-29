<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueSpecialtySeeder extends Seeder
{
    public function run()
    {
        DB::table('specialties')->insert([

            [
                'name' => 'Acupuntor',
            ],
            [
                'name' => 'Alergólogo',
            ],
            [
                'name' => 'Anatomopatólogo',
            ],
            [
                'name' => 'Anestesiólogo',
            ],
            [
                'name' => 'Angiólogo',
            ],
            [
                'name' => 'Audiólogo',
            ],
            [
                'name' => 'Cardiólogo',
            ],
            [
                'name' => 'Cardiólogo pediátrico',
            ],
            [
                'name' => 'Cirujano cardiovascular y torácico',
            ],
            [
                'name' => 'Cirujano de la mano',
            ],
            [
                'name' => 'Cirujano estético y cosmético',
            ],
            [
                'name' => 'Cirujano general',
            ],
            [
                'name' => 'Cirujano maxilofacial',
            ],
            [
                'name' => 'Cirujano oncólogo',
            ],
            [
                'name' => 'Cirujano pediátrico',
            ],
            [
                'name' => 'Cirujano plástico',
            ],
            [
                'name' => 'Dermatólogo',
            ],
            [
                'name' => 'Dermatólogo pediátrico',
            ],
            [
                'name' => 'Diabetólogo',
            ],
            [
                'name' => 'Endocrinólogo',
            ],
            [
                'name' => 'Endocrinólogo pediátrico',
            ],
            [
                'name' => 'Endoscopista',
            ],
            [
                'name' => 'Enfermero',
            ],
            [
                'name' => 'Fisioterapeuta',
            ],
            [
                'name' => 'Gastroenterólogo',
            ],
            [
                'name' => 'Gastroenterólogo pediátrico',
            ],
            [
                'name' => 'Genetista',
            ],
            [
                'name' => 'Geriatra',
            ],
            [
                'name' => 'Ginecólogo oncológico',
            ],
            [
                'name' => 'Ginecólogo',
            ],
            [
                'name' => 'Hematólogo',
            ],
            [
                'name' => 'Hematólogo pediatra',
            ],
            [
                'name' => 'Homeópata',
            ],
            [
                'name' => 'Infectólogo',
            ],
            [
                'name' => 'Infectólogo pediatra',
            ],
            [
                'name' => 'Inmunólogo',
            ],
            [
                'name' => 'Analista clínico',
            ],
            [
                'name' => 'Logopeda',
            ],
            [
                'name' => 'Terapeuta complementario',
            ],
            [
                'name' => 'Especialista en Medicina Crítica y Terapia Intensiva',
            ],
            [
                'name' => 'Especialista en Medicina del Deporte',
            ],
            [
                'name' => 'Especialista en Medicina del Trabajo',
            ],
            [
                'name' => 'Médico estético',
            ],
            [
                'name' => 'Médico de familia',
            ],
            [
                'name' => 'Médico general',
            ],
            [
                'name' => 'Especialista en Medicina Integrada',
            ],
            [
                'name' => 'Internista',
            ],
            [
                'name' => 'Especialista en Medicina Nuclear',
            ],
            [
                'name' => 'Especialista en Medicina Preventiva',
            ],
            [
                'name' => 'Naturista',
            ],
            [
                'name' => 'Nefrólogo',
            ],
            [
                'name' => 'Nefrólogo pediatra',
            ],
            [
                'name' => 'Neonatólogo',
            ],
            [
                'name' => 'Neumólogo',
            ],
            [
                'name' => 'Neumólogo pediatra',
            ],
            [
                'name' => 'Neurocirujano',
            ],
            [
                'name' => 'Neurofisiólogo',
            ],
            [
                'name' => 'Neurólogo',
            ],
            [
                'name' => 'Neurólogo pediatra',
            ],
            [
                'name' => 'Nutricionista',
            ],
            [
                'name' => 'Nutriólogo clínico',
            ],
            [
                'name' => 'Especialista en Obesidad y Delgadez',
            ],
            [
                'name' => 'Dentista - Odontólogo',
            ],
            [
                'name' => 'Oftalmólogo',
            ],
            [
                'name' => 'Oftalmólogo pediátrico',
            ],
            [
                'name' => 'Oncólogo médico',
            ],
            [
                'name' => 'Oncólogo pediátrico',
            ],
            [
                'name' => 'Optometrista',
            ],
            [
                'name' => 'Ortopedista',
            ],
            [
                'name' => 'Ortopedista infantil',
            ],
            [
                'name' => 'Otorrinolaringólogo',
            ],
            [
                'name' => 'Patólogo clínico',
            ],
            [
                'name' => 'Pediatra',
            ],
            [
                'name' => 'Podiatra',
            ],
            [
                'name' => 'Podólogo',
            ],
            [
                'name' => 'Proctólogo',
            ],
            [
                'name' => 'Psicoanalista',
            ],
            [
                'name' => 'Psicólogo',
            ],
            [
                'name' => 'Psicopedagogo',
            ],
            [
                'name' => 'Psiquiatra',
            ],
            [
                'name' => 'Psiquiatra infantil',
            ],
            [
                'name' => 'Quiropráctico',
            ],
            [
                'name' => 'Radiólogo',
            ],
            [
                'name' => 'Radioterapeuta',
            ],
            [
                'name' => 'Especialista en Rehabilitación y Medicina Física',
            ],
            [
                'name' => 'Especialista en Retina Médica y Quirúrgica',
            ],
            [
                'name' => 'Reumatólogo',
            ],
            [
                'name' => 'Sexólogo',
            ],
            [
                'name' => 'Algólogo',
            ],
            [
                'name' => 'Terapeuta ocupacional',
            ],
            [
                'name' => 'Traumatólogo',
            ],
            [
                'name' => 'Urgenciólogo',
            ],
            [
                'name' => 'Urólogo',
            ],
            [
                'name' => 'Reumatólogo pediátrico',
            ],
            [
                'name' => 'Cirujano cardiovascular y torácico pediátrico',
            ],
            [
                'name' => 'Urólogo pediátrico',
            ],
            [
                'name' => 'Cirujano cardiovascular',
            ],
            [
                'name' => 'Cirujano torácico',
            ],
            [
                'name' => 'Radio Oncólogo',
            ],
            [
                'name' => 'Epidemiólogo',
            ],
            [
                'name' => 'Odontólogo pediatra',
            ],
            [
                'name' => 'Cirujano bariatra',
            ],
            [
                'name' => 'Foniatra',
            ],
            [
                'name' => 'Otorrinolaringólogo Pediátrico',
            ],
            [
                'name' => 'Cirujano vascular',
            ],
            [
                'name' => 'Especialidad en Medicina del Enfermo Pediátrico en Estado Crítico',
            ],
            [
                'name' => 'Patólogo Bucal',
            ],
            [
                'name' => 'Gerontologo',
            ],

        ]);
    }
}
