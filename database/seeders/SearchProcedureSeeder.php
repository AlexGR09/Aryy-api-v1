<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SearchProcedureSeeder extends Seeder
{
    
    public function run()
    {
        $searchPhysiciansByName = "
        DROP PROCEDURE IF EXISTS searchPhysiciansByName;
        CREATE PROCEDURE searchPhysiciansByName(IN value VARCHAR(200))
        BEGIN
           SELECT *
           FROM physicians
           WHERE professional_name LIKE CONCAT('%',value,'%')
           AND is_verified = 'verified';
        END;
        ";
  
        DB::unprepared($searchPhysiciansByName);
    }
}
