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
            SELECT physicians.id as physician_id, physicians.professional_name, GROUP_CONCAT(specialties.name) as specialties
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
            SELECT id as specialty_id, name
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
        $getPhysicianByIdAndCityIdOfFacilities = "
        DROP PROCEDURE IF EXISTS getPhysicianByIdAndCityIdOfFacilities;
        CREATE PROCEDURE getPhysicianByIdAndCityIdOfFacilities(IN physician_id BIGINT,  IN city_id BIGINT)
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
        DB::unprepared($getPhysicianByIdAndCityIdOfFacilities);




        // BÚSQUEDA DE INSTALACIONES POR EL ID DEL MÉDICO
        $searchFacilitiesByPhysicianId = "
        DROP PROCEDURE IF EXISTS searchFacilitiesByPhysicianId;
        CREATE PROCEDURE searchFacilitiesByPhysicianId(IN physician_id BIGINT)
        BEGIN
            SELECT facilities.*
            FROM facilities
            JOIN facility_physician
            ON facilities.id = facility_physician.facility_id
            WHERE facility_physician.physician_id = physician_id;
        END;
        ";
        DB::unprepared($searchFacilitiesByPhysicianId);

        // BÚSQUEDA DE INSTALACIONES POR ID DEL MÉDICO Y ID DE LA CIUDAD
        $searchFacilitiesByPhysicianIdAndCityId = "
        DROP PROCEDURE IF EXISTS searchFacilitiesByPhysicianIdAndCityId;
        CREATE PROCEDURE searchFacilitiesByPhysicianIdAndCityId(IN physician_id BIGINT, IN city_id BIGINT)
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
        DB::unprepared($searchFacilitiesByPhysicianIdAndCityId);
    }
}
