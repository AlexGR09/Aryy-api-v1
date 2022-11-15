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

        // BÚSQUEDA DE MÉDICO POR NOMBRE
        $searchPhysiciansByName = "
        DROP PROCEDURE IF EXISTS searchPhysiciansByName;
        CREATE PROCEDURE searchPhysiciansByName(IN physician_name VARCHAR(200))
        BEGIN
            SELECT *
            FROM physicians
            WHERE professional_name LIKE CONCAT('%',physician_name,'%')
            AND is_verified = 'verified'
            GROUP BY physicians.id
            ORDER BY professional_name ASC;
        END;
        ";
        DB::unprepared($searchPhysiciansByName);

        // BÚSQUEDA DE MÉDICO POR NOMBRE Y CITY_ID DE INSTALACIONES
        $searchPhysiciansByNameAndCityId = "
        DROP PROCEDURE IF EXISTS searchPhysiciansByNameAndCityId;
        CREATE PROCEDURE searchPhysiciansByNameAndCityId(IN physician_name VARCHAR(200),  IN city_id BIGINT)
        BEGIN
            SELECT physicians.*, facilities.city_id
            FROM physicians
            JOIN facility_physician
            ON physicians.id = facility_physician.physician_id
            JOIN facilities
            ON facility_physician.facility_id = facilities.id 
            WHERE physicians.professional_name LIKE CONCAT('%',physician_name,'%')
            AND physicians.is_verified = 'verified'
            AND  facilities.city_id = city_id
            GROUP BY physicians.id, facilities.city_id
            ORDER BY professional_name ASC;
        END;
        ";
        DB::unprepared($searchPhysiciansByNameAndCityId);

        // $physicians = DB::table('physicians')
        //         ->join('facility_physician', 'physicians.id', '=', 'facility_physician.physician_id')
        //         ->join('facilities', 'facility_physician.facility_id', '=', 'facilities.id')
        //         ->where('physicians.professional_name', 'like', '%'.$request->value.'%')
        //         ->where('facilities.city_id', '=', $request->city_id)
        //         ->select('physicians.*', 'facilities.city_id as city_id')
        //         ->groupBy('physicians.id', 'city_id')
        //         ->get();

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
