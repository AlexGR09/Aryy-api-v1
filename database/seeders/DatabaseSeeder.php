<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(AllergiesSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(InsuranceSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(SubSpecialtySeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(MedicalServiceSeeder::class);
        $this->call(RelationshipsSeeder::class);
        $this->call(KinshipSeeder::class);
        /* $this->call(MedicalHistorySeeder::class); */
        $this->call(PhysicianSeeder::class);
        $this->call(PhysicianSpecialtySeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(FacilityPyshicianSeeder::class);
        $this->call(SpecialtiesDiseasesSeeder::class);
        $this->call(MedicalServicesSpecialtiesSeeder::class);
        $this->call(MedicalServicesPhysicianSeeder::class);
        $this->call(DiseasesPhysicianSeeder::class);
        // $this->call(SearchProcedureSeeder::class);
        //$this->call(AllergiesPatientSeeder::class);
        //$this->call(PostnatalBackgroundSeeder::class);
        //$this->call(NonPathologicalBackgroundSeeder::class);
        //$this->call(MedicalHistorySeeder::class);
        $this->call(HealthInsuranceSeeder::class);
        $this->call(OcupationPatientSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(PersonalizedQuestionnaireSeeder::class);
        $this->call(VitalSignSeeder::class);
        $this->call(PrescriptionSeeder::class);
        $this->call(MedicalAppointmentSeeder::class);
    }
}
