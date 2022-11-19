<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SearchProcedureSeeder extends Seeder
{
    public function run()
    {
        /* PROCEDIMIENTOS ALMACENADOS */

        // BÚSQUEDA DE MÉDICOS CON SUS ESPECIALIDADES POR NOMBRE DEL MÉDICO
        $getPhysiciansByNameWithSpecialties = "
        DROP PROCEDURE IF EXISTS getPhysiciansByNameWithSpecialties;
        CREATE PROCEDURE getPhysiciansByNameWithSpecialties(IN physician_name VARCHAR(150))
        BEGIN
            SELECT physicians.id as physician_id, physicians.professional_name, GROUP_CONCAT(specialties.name) as specialties, 'physician' AS model
            FROM physicians
            JOIN physician_specialty
            ON physicians.id = physician_specialty.physician_id
            JOIN specialties
            ON physician_specialty.specialty_id = specialties.id
            WHERE physicians.is_verified = 'verified'   
            AND physicians.professional_name LIKE CONCAT('%',physician_name,'%')
            GROUP BY physicians.id
            ORDER BY professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysiciansByNameWithSpecialties);

        // BÚSQUEDA DE ESPECIALIDADES POR NOMBRE DE LA ESPECIALIDAD
        $getSpecialtiesByName = "
        DROP PROCEDURE IF EXISTS getSpecialtiesByName;
        CREATE PROCEDURE getSpecialtiesByName(IN specialty_name VARCHAR(150))
        BEGIN
            SELECT id as specialty_id, name as specialty_name, 'specialty' AS model
            FROM specialties
            WHERE name LIKE CONCAT('%',specialty_name,'%')
            ORDER BY name ASC;
        END;
        ";
        DB::unprepared($getSpecialtiesByName);

        // BÚSQUEDA DE MÉDICO POR ID
        $getPhysicianById = "
        DROP PROCEDURE IF EXISTS getPhysicianById;
        CREATE PROCEDURE getPhysicianById(IN physician_id BIGINT)
        BEGIN
            SELECT *
            FROM physicians
            WHERE id = physician_id
            AND is_verified = 'verified';
        END;
        ";
        DB::unprepared($getPhysicianById);

        // BÚSQUEDA DE MÉDICO POR ID Y CITY_ID DE INSTALACIONES
        $getPhysicianByIdAndCityIdOfFacility = "
        DROP PROCEDURE IF EXISTS getPhysicianByIdAndCityIdOfFacility;
        CREATE PROCEDURE getPhysicianByIdAndCityIdOfFacility(IN physician_id BIGINT,  IN city_id BIGINT)
        BEGIN
            SELECT physicians.*, facilities.city_id
            FROM physicians
            JOIN facility_physician
            ON physicians.id = facility_physician.physician_id
            JOIN facilities
            ON facility_physician.facility_id = facilities.id 
            WHERE physicians.id = physician_id
            AND physicians.is_verified = 'verified'
            AND  facilities.city_id = city_id
            GROUP BY physicians.id, facilities.city_id
            ORDER BY professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysicianByIdAndCityIdOfFacility);

        // BÚSQUEDA DE MÉDICOS POR ID DE ESPECIALIDAD
        $getPhysiciansByIdOfSpecialty = "
        DROP PROCEDURE IF EXISTS getPhysiciansByIdOfSpecialty;
        CREATE PROCEDURE getPhysiciansByIdOfSpecialty(IN specialty_id BIGINT)
        BEGIN
            SELECT physicians.*
            FROM physicians
            JOIN physician_specialty
            ON physicians.id = physician_specialty.physician_id
            JOIN specialties
            ON physician_specialty.specialty_id = specialties.id
            WHERE physicians.is_verified = 'verified'
            AND specialties.id = specialty_id
            ORDER BY physicians.professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysiciansByIdOfSpecialty);

        // BÚSQUEDA DE MÉDICOS POR ID DE LA ESPECIALIDAD Y CITY_ID DE INSTALACIONES
        $getPhysiciansByIdOfSpecialtyAndCityIdOfFacility = "
        DROP PROCEDURE IF EXISTS getPhysiciansByIdOfSpecialtyAndCityIdOfFacility;
        CREATE PROCEDURE getPhysiciansByIdOfSpecialtyAndCityIdOfFacility(IN specialty_id BIGINT,  IN city_id BIGINT)
        BEGIN
            SELECT physicians.*, facilities.city_id
            FROM physicians
            JOIN physician_specialty
            ON physicians.id = physician_specialty.physician_id
            JOIN specialties
            ON physician_specialty.specialty_id = specialties.id
            JOIN facility_physician
            ON physicians.id = facility_physician.physician_id
            JOIN facilities
            ON facility_physician.facility_id = facilities.id
            WHERE physicians.is_verified = 'verified'
            AND specialties.id = specialty_id
            AND facilities.city_id = city_id
            GROUP BY physicians.id, facilities.city_id
            ORDER BY professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysiciansByIdOfSpecialtyAndCityIdOfFacility);

        // BÚSQUEDA DE MÉDICOS POR ID DE LA ENFERMEDAD
        $getPhysiciansByIdOfDisease = "
        DROP PROCEDURE IF EXISTS getPhysiciansByIdOfDisease;
        CREATE PROCEDURE getPhysiciansByIdOfDisease(IN disease_id BIGINT)
        BEGIN
            SELECT physicians.*
            FROM physicians
            JOIN disease_physician
            ON physicians.id = disease_physician.physician_id
            JOIN diseases
            ON disease_physician.disease_id = diseases.id
            WHERE physicians.is_verified = 'verified'
            AND diseases.id = disease_id
            ORDER BY physicians.professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysiciansByIdOfDisease);

        // BÚSQUEDA DE MÉDICOS POR ID DE LA ENFERMEDAD Y CITY_ID DE INSTALACIONES
        $getPhysiciansByIdOfDiseaseAndCityIdOfFacility = "
        DROP PROCEDURE IF EXISTS getPhysiciansByIdOfDiseaseAndCityIdOfFacility;
        CREATE PROCEDURE getPhysiciansByIdOfDiseaseAndCityIdOfFacility(IN disease_id BIGINT,  IN city_id BIGINT)
        BEGIN
            SELECT physicians.*, facilities.city_id
            FROM physicians
            JOIN disease_physician
            ON physicians.id = disease_physician.physician_id
            JOIN diseases
            ON disease_physician.disease_id = diseases.id
            JOIN facility_physician
            ON physicians.id = facility_physician.physician_id
            JOIN facilities
            ON facility_physician.facility_id = facilities.id
            WHERE physicians.is_verified = 'verified'
            AND diseases.id = disease_id
            AND facilities.city_id = city_id
            GROUP BY physicians.id, facilities.city_id
            ORDER BY professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysiciansByIdOfDiseaseAndCityIdOfFacility);

        // BÚSQUEDA DE MÉDICOS POR ID DEL SERVICIO
        $getPhysiciansByIdOfService = "
        DROP PROCEDURE IF EXISTS getPhysiciansByIdOfService;
        CREATE PROCEDURE getPhysiciansByIdOfService(IN medical_service_id BIGINT)
        BEGIN
            SELECT physicians.*
            FROM physicians
            JOIN medical_service_physician
            ON physicians.id = medical_service_physician.physician_id
            JOIN medical_services
            ON medical_service_physician.medical_service_id = medical_services.id
            WHERE physicians.is_verified = 'verified'
            AND medical_services.id = medical_service_id
            ORDER BY physicians.professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysiciansByIdOfService);

        // BÚSQUEDA DE MÉDICOS POR ID DEL SERVICIO Y CITY_ID DE INSTALACIONES
        $getPhysiciansByIdOfServiceAndCityIdOfFacility = "
        DROP PROCEDURE IF EXISTS getPhysiciansByIdOfServiceAndCityIdOfFacility;
        CREATE PROCEDURE getPhysiciansByIdOfServiceAndCityIdOfFacility(IN medical_service_id BIGINT,  IN city_id BIGINT)
        BEGIN
            SELECT physicians.*, facilities.city_id
            FROM physicians
            JOIN medical_service_physician
            ON physicians.id = medical_service_physician.physician_id
            JOIN medical_services
            ON medical_service_physician.medical_service_id = medical_services.id
            JOIN facility_physician
            ON physicians.id = facility_physician.physician_id
            JOIN facilities
            ON facility_physician.facility_id = facilities.id
            WHERE physicians.is_verified = 'verified'
            AND medical_services.id = medical_service_id
            AND facilities.city_id = city_id
            GROUP BY physicians.id, facilities.city_id
            ORDER BY professional_name ASC;
        END;
        ";
        DB::unprepared($getPhysiciansByIdOfServiceAndCityIdOfFacility);
        
        // BÚSQUEDA DE INSTALACIONES POR EL ID DEL MÉDICO
        $getFacilitiesByPhysicianId = "
        DROP PROCEDURE IF EXISTS getFacilitiesByPhysicianId;
        CREATE PROCEDURE getFacilitiesByPhysicianId(IN physician_id BIGINT)
        BEGIN
            SELECT facilities.*
            FROM facilities
            JOIN facility_physician
            ON facilities.id = facility_physician.facility_id
            WHERE facility_physician.physician_id = physician_id;
        END;
        ";
        DB::unprepared($getFacilitiesByPhysicianId);

        // BÚSQUEDA DE INSTALACIONES POR ID DEL MÉDICO Y ID DE LA CIUDAD
        $getFacilitiesByPhysicianIdAndCityId = "
        DROP PROCEDURE IF EXISTS getFacilitiesByPhysicianIdAndCityId;
        CREATE PROCEDURE getFacilitiesByPhysicianIdAndCityId(IN physician_id BIGINT, IN city_id BIGINT)
        BEGIN
            SELECT facilities.*
            FROM facilities
            JOIN facility_physician
            ON facilities.id = facility_physician.facility_id
            JOIN physicians 
            ON facility_physician.physician_id = physicians.id
            WHERE facilities.city_id = city_id
            AND physicians.id = physician_id;
        END;
        ";
        DB::unprepared($getFacilitiesByPhysicianIdAndCityId);
    }
}
