<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            // ADMINISTRADOR
            // CRUD ROLES
            ['name' => 'show roles', 'guard_name' => 'sanctum'],
            ['name' => 'create roles', 'guard_name' => 'sanctum'],
            ['name' => 'edit roles', 'guard_name' => 'sanctum'],
            ['name' => 'delete roles', 'guard_name' => 'sanctum'],
            // CRUD PERMISOS
            ['name' => 'show permissions', 'guard_name' => 'sanctum'],
            ['name' => 'create permissions', 'guard_name' => 'sanctum'],
            ['name' => 'edit permissions', 'guard_name' => 'sanctum'],
            ['name' => 'delete permissions', 'guard_name' => 'sanctum'],
            // CRUD USUARIOS
            ['name' => 'show users', 'guard_name' => 'sanctum'],
            ['name' => 'create users', 'guard_name' => 'sanctum'],
            ['name' => 'edit users', 'guard_name' => 'sanctum'],
            ['name' => 'delete users', 'guard_name' => 'sanctum'],
            //  REGISTRO DE USUARIO (MEDICO O PACIENTE)
            ['name' => 'show user profile', 'guard_name' => 'sanctum'],
            ['name' => 'edit user profile', 'guard_name' => 'sanctum'],
            ['name' => 'delete user profile', 'guard_name' => 'sanctum'],
            // CATÁLOGOS
            // CRUD ESPECIALIDADES
            ['name' => 'show specialties', 'guard_name' => 'sanctum'],
            ['name' => 'create specialties', 'guard_name' => 'sanctum'],
            ['name' => 'edit specialties', 'guard_name' => 'sanctum'],
            ['name' => 'delete specialties', 'guard_name' => 'sanctum'],
            // CRUD ENFERMEDADES
            ['name' => 'show diseases', 'guard_name' => 'sanctum'],
            ['name' => 'create diseases', 'guard_name' => 'sanctum'],
            ['name' => 'edit diseases', 'guard_name' => 'sanctum'],
            ['name' => 'delete diseases', 'guard_name' => 'sanctum'],
            // CRUD SERVICIOS MÉDICOS
            ['name' => 'show medical services', 'guard_name' => 'sanctum'],
            ['name' => 'create medical services', 'guard_name' => 'sanctum'],
            ['name' => 'edit medical services', 'guard_name' => 'sanctum'],
            ['name' => 'delete medical services', 'guard_name' => 'sanctum'],
            // CRUD ALERGÍAS
            ['name' => 'show alergies', 'guard_name' => 'sanctum'],
            ['name' => 'create alergies', 'guard_name' => 'sanctum'],
            ['name' => 'edit alergies', 'guard_name' => 'sanctum'],
            ['name' => 'delete alergies', 'guard_name' => 'sanctum'],
            // CRUD OCUPACIONES
            ['name' => 'show ocupations', 'guard_name' => 'sanctum'],
            ['name' => 'create ocupations', 'guard_name' => 'sanctum'],
            ['name' => 'edit ocupations', 'guard_name' => 'sanctum'],
            ['name' => 'delete ocupations', 'guard_name' => 'sanctum'],
            // CRUD SEGUROS MÉDICOS
            ['name' => 'show insurances', 'guard_name' => 'sanctum'],
            ['name' => 'create insurances', 'guard_name' => 'sanctum'],
            ['name' => 'edit insurances', 'guard_name' => 'sanctum'],
            ['name' => 'delete insurances', 'guard_name' => 'sanctum'],
            // CRUD PAÍSES
            ['name' => 'show countries', 'guard_name' => 'sanctum'],
            ['name' => 'create countries', 'guard_name' => 'sanctum'],
            ['name' => 'edit countries', 'guard_name' => 'sanctum'],
            ['name' => 'delete countries', 'guard_name' => 'sanctum'],
            // CRUD ESTADOS
            ['name' => 'show states', 'guard_name' => 'sanctum'],
            ['name' => 'create states', 'guard_name' => 'sanctum'],
            ['name' => 'edit states', 'guard_name' => 'sanctum'],
            ['name' => 'delete states', 'guard_name' => 'sanctum'],
            // CRUD CUIDADES
            ['name' => 'show cities', 'guard_name' => 'sanctum'],
            ['name' => 'create cities', 'guard_name' => 'sanctum'],
            ['name' => 'edit cities', 'guard_name' => 'sanctum'],
            ['name' => 'delete cities', 'guard_name' => 'sanctum'],
            // NUEVOS USUARIOS
            ['name' => 'complete patient profile', 'guard_name' => 'sanctum'],
            ['name' => 'complete physician profile', 'guard_name' => 'sanctum'],
            // PACIENTES
            ['name' => 'show patient profile', 'guard_name' => 'sanctum'],
            ['name' => 'edit patient profile', 'guard_name' => 'sanctum'],

            ['name' => 'show basic information', 'guard_name' => 'sanctum'],
            ['name' => 'show medical history', 'guard_name' => 'sanctum'],
            ['name' => 'edit basic information', 'guard_name' => 'sanctum'],

            ['name' => 'show non pathological background', 'guard_name' => 'sanctum'],
            ['name' => 'edit non pathological background', 'guard_name' => 'sanctum'],

            ['name' => 'show pathological background', 'guard_name' => 'sanctum'],
            ['name' => 'edit pathological background', 'guard_name' => 'sanctum'],

            ['name' => 'show hereditary background', 'guard_name' => 'sanctum'],
            ['name' => 'edit hereditary background', 'guard_name' => 'sanctum'],

            ['name' => 'show patient vaccination History', 'guard_name' => 'sanctum'],
            ['name' => 'edit patient vaccination History', 'guard_name' => 'sanctum'],

            // MÉDICOS
            ['name' => 'show physician profile', 'guard_name' => 'sanctum'],
            ['name' => 'edit physician profile', 'guard_name' => 'sanctum'],
            // INSTALACIONES
            ['name' => 'show physician facility', 'guard_name' => 'sanctum'],
            ['name' => 'create physician facility', 'guard_name' => 'sanctum'],
            ['name' => 'edit physician facility', 'guard_name' => 'sanctum'],
            ['name' => 'delete physician facility', 'guard_name' => 'sanctum'],
        ]);
    }
}
