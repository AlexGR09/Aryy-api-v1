<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'guard_name' => 'sanctum',
            ],
            [
                'name' => 'User',
                'guard_name' => 'sanctum',
            ],
            [
                'name' => 'NewPatient',
                'guard_name' => 'sanctum',
            ],
            [
                'name' => 'NewPhysician',
                'guard_name' => 'sanctum',
            ],
            [
                'name' => 'PhysicianInVerification',
                'guard_name' => 'sanctum',
            ],
            [
                'name' => 'Patient',
                'guard_name' => 'sanctum',
            ],
            [
                'name' => 'Physician',
                'guard_name' => 'sanctum',
            ],
        ]);

        // ASIGNACIÓN DE ROLES Y PERMISOS A USUARIOS
        // ADMINISTRADOR
        Role::findByName('Administrator')->givePermissionTo(Permission::all());
        // USER
        Role::findByName('User')->givePermissionTo([
            'show user profile', 
            'edit user profile', 
            'delete user profile'
        ]);
        // NUEVO PACIENTE
        Role::findByName('NewPatient')->givePermissionTo(['complete patient profile']);
        // NUEVO MÉDICO
        Role::findByName('NewPhysician')->givePermissionTo(['complete physician profile']);
        // MÉDICO EN VERIFICACIÓN 
        Role::findByName('PhysicianInVerification')->givePermissionTo([
            'show physician profile',
            'create physician facility'
        ]);
        // PACIENTE
        Role::findByName('Patient')->givePermissionTo([
            'show patient profile', 
            'edit patient profile'
        ]);
        // MÉDICO
        Role::findByName('Physician')->givePermissionTo([
            'show physician profile', 
            'edit physician profile',
            'show physician facility',
            'create physician facility',
            'edit physician facility',
            'delete physician facility'
        ]);
    }
}
