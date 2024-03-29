<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /*SEEDER DE CATALOGOS*/
        $this->call(CataloguePermissionSeeder::class);
        $this->call(CatalogueRoleSeeder::class);
        $this->call(CatalogueCountrySeeder::class);
        $this->call(CatalogueStateSeeder::class);
        $this->call(CatalogueCitySeeder::class);
        $this->call(CatalogueAllergiesSeeder::class);
        $this->call(CatalogueOccupationSeeder::class);
        $this->call(CatalogueInsuranceSeeder::class);
        $this->call(CatalogueSpecialtySeeder::class);
        $this->call(CatalogueSubSpecialtySeeder::class);
        $this->call(CatalogueDiseaseSeeder::class);
        $this->call(CatalogueMedicalServiceSeeder::class);
        $this->call(CatalogueRelationshipsSeeder::class);
        $this->call(CatalogueKinshipSeeder::class);
        $this->call(CatalogueSymptomSeeder::class);
        $this->call(CatalogueSpecialtiesDiseasesSeeder::class);
        $this->call(CatalogueMedicalServicesSpecialtiesSeeder::class);
        $this->call(CatalogueLanguageSeeder::class);
        $this->call(CatalogueBloodTypeSeeder::class);
        $this->call(CatalogueThyroidDiseaseSeeder::class);
        $this->call(CatalogueCancerSeeder::class);
        $this->call(CatalogueBloodDiseaseSeeder::class);
        $this->call(CatalogueKidneyStoneSeeder::class);
        $this->call(CatalogueHepatitisSeeder::class);
        $this->call(CatalogueRespiratoryPathologySeeder::class);
        $this->call(CataloguePhysicalActivitySeeder::class);
        $this->call(CatalogueAlimentaryAllergySeeder::class);
        $this->call(CatalogueDrugAllergySeeder::class);
        $this->call(CatalogueEnviromentalFactorSeeder::class);
        $this->call(CatalogueInsuranceSeeder::class);
        $this->call(CataloguePathologyGastrointestinalSeeder::class);
        $this->call(CatalogueSexualTransmisionSeeder::class);

        /*FIN DE SEEDER DE CATALOGOS*/
        /*SEEDER GENERALES*/
        $this->call(UserSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(PhysicianSeeder::class);
        $this->call(PhysicianSpecialtySeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(FacilityPyshicianSeeder::class);
        $this->call(MedicalServicesPhysicianSeeder::class);
        $this->call(DiseasesPhysicianSeeder::class);
        // $this->call(SearchProcedureSeeder::class);
        $this->call(AllergiesPatientSeeder::class);
        $this->call(PostnatalBackgroundSeeder::class);
        $this->call(NonPathologicalBackgroundSeeder::class);
        $this->call(ObstetricGynecologicalBackgroundSeeder::class);
        $this->call(PerinatalBackgroundSeeder::class);
        $this->call(MedicalHistorySeeder::class);
        //$this->call(BasicInformationSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(HealthInsuranceSeeder::class);
        $this->call(OcupationPatientSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(PersonalizedQuestionnaireSeeder::class);
        $this->call(VitalSignSeeder::class);
        $this->call(PrescriptionSeeder::class);
        $this->call(MedicalAppointmentSeeder::class);
        $this->call(PillReminderSeeder::class);
        
    }
}
