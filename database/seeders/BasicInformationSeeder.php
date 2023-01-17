<?php

namespace Database\Seeders;

use App\Models\AllergyPatient;
use App\Models\HereditaryBackground;
use App\Models\NonPathologicalBackground;
use App\Models\ObgynBackground;
use App\Models\PathologicalBackground;
use App\Models\Patient;
use App\Models\PerinatalBackground;
use App\Models\PostnatalBackground;
use App\Models\PyschologicalBackground;
use App\Models\VaccinationHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = Patient::all();

        foreach ($patients as $patient ) {
            $patient->vitalSign()->create([
                'temperature' => 46,
                'weight' => 87,
                'breathing_frecuncy' => 10,
                'systolic_pressure' => 1,
                'diasystolic_pressure' => 1,
                'heart_rate' => 1,
                'oxygen_saturation' => 1,
                'body_mass' => 1,
                'body_fat' => 1,
                'weight_loss' => 1,
                'fat' => 1,
                'waist' => 1,
                'water' => 1,
                'muscle' => 1,
                'abdomen' => 1,
            ]);
            $allergyPatient = AllergyPatient::create([
                'food_allergy' => 'no',
                'drug_allergy' => 'no',
                'environmental_allergy' => 'no',
            ]);

            $pathologicalBackground = PathologicalBackground::create([
                'previous_surgeries' => 'no',
                'blood_transfusions' => 'no',
                'diabetes' => 'no',
                'heart_diseases' => 'no',
                'blood_pressure' => 'no',
                'thyroid_diseases' => 'no',
                'cancer' => 'no',
                'kidney_stones' => 'no',
                'hepatitis' => 'no',
                'trauma' => 'no',
                'respiratory_diseases' => 'no',
                'ets' => 'no',
                'gastrointestinal_pathologies' => 'no',
            ]);

            $nonPathologicalBackground = NonPathologicalBackground::create([
                'physical_activity' => 'no',
                'rest_time' => 'no',
                'smoking' => 'no',
                'alcoholim' => 'no',
                'other_substances' => 'no',
                'diet' => 'no',
                'drug_active' => 'no',
                'previous_medication' => 'no',
            ]);

            $hereditaryBackground = HereditaryBackground::create([
                'diabetes' => 'no',
                'heart_diseases' => 'no',
                'blood_pressure' => 'no',
                'thyroid_diseases' => 'no',
                'cancer' => 'no',
                'kidney_stones' => 'no',
            ]);

            $vaccinationHistory = VaccinationHistory::create([
                'vaccine' => 'Cansino',
                'dose' => '1111',
                'lot_number' => '12345',
                'application_date' => '2022-12-12',
            ]);

            $postnatalBackground = PostnatalBackground::create([
                'delivery_details' => 'A',
                'baby_name' => 'Pedro',
                'baby_weight' => 12,
                'baby_health' => 'good',
                'type_of_feeding' => 'A',
                'emotonial_state' => 'A',
            ]);

            $obgynBackground = ObgynBackground::create([
                'first_menstruation' => '2022-12-12',
                'last_menstruation' => '2022-12-20',
                'bleeding' => 'Ligero',
                'pain' => 'Senos sensibles',
                'intimate_hygiene' => 'Toalla',
                'cervical_discharge' => 'Pegajoso',
                'sex' => 'Sin protección',
                'pregnancies' => 'no',
                'cervical_cancer' => 'no',
                'breast_cancer' => 'no',
                'sexually_active' => 'no',
                'family_planning' => 'no',
                'hormone_replacement_therapy' => 'no',
                'last_pap_smear' => '2022-12-12',
                'last_mammography' => '2022-12-12',
            ]);

            $perinatalBackground = PerinatalBackground::create([
                'last_menstrual_cycle' => '2022-12-12',
                'cycle_time' => '2022-12-12',
                'contraceptive_method_use' => 'no',
                'assisted_conception' => 'no',
                'final_ppf' => '2022-02-10',
            ]);
            $pyschologicalBackground = PyschologicalBackground::create([
                'family_history' => 'good',
                'disease_awareness' => 'good',
                'areas_affected_by_the_disease' => 'good',
                'family_support_group' => 'good',
                'family_group_of_the_patient' => 'good',
                'aspects_of_social_life' => 'good',
                'aspects_of_working_life' => 'good',
                'relationship_whit_authority' => 'good',
                'inpulse_control' => 'good',
                'frustration_management' => 'good',
            ]);
            $patient->medicalHistory()->create([
                'height' => 12,
                'weight' => 12,
                'imc' => 12,
                'blood_type' => 12,
                // 'active_medication' => false,
                // 'previous_medication' => false,
                'allergy_patient_id' => $allergyPatient->id,
                'pathological_background_id' => $pathologicalBackground->id,
                'non_pathological_background_id' => $nonPathologicalBackground->id,
                'hereditary_background_id' => $hereditaryBackground->id,
                'vaccination_history_id' => $vaccinationHistory->id,
                'postnatal_background_id' => $postnatalBackground->id,
                'gynecological_history_id' => $obgynBackground->id,
                'perinatal_background_id' => $perinatalBackground->id,
                'pyschological_background_id' => $pyschologicalBackground->id,
            ]);
        }
    }
}
