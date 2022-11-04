<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'name' => 'Administrator', 
                'guard_name' => 'sanctum'
            ],
            [
                'name' => 'User', 
                'guard_name' => 'sanctum'
            ],
            [
                'name' => 'NewPatient', 
                'guard_name' => 'sanctum'
            ],    
            [
                'name' => 'NewPhysician', 
                'guard_name' => 'sanctum'
            ],
            [
                'name' => 'NewPhysicianInVerification', 
                'guard_name' => 'sanctum'
            ],
            [
                'name' => 'Patient', 
                'guard_name' => 'sanctum'
            ],
            [
                'name' => 'Physician', 
                'guard_name' => 'sanctum'
            ]
        ]);

        // ASIGNACIÓN DE ROLES Y PERMISOS A USUARIOS 
        // ADMINISTRADOR
        Role::findByName('Administrator')->givePermissionTo(Permission::all());
        // USER
        Role::findByName('User')->givePermissionTo([
            'show profile', 
            'edit profile', 
            'delete profile'
        ]);
        // NUEVO PACIENTE
        Role::findByName('NewPatient')->givePermissionTo(['complete patient profile']);
        // NUEVO MÉDICO
        Role::findByName('NewPhysician')->givePermissionTo(['complete physician profile']);
        // MÉDICO EN VERIFICACIÓN 
        Role::findByName('PhysicianInVerification')->givePermissionTo(['show physician']);
        // PACIENTE
        Role::findByName('Patient')->givePermissionTo([
            'show patient', 
            'edit patient'
        ]);
        // MÉDICO
        Role::findByName('Physician')->givePermissionTo([
            'show physician', 
            'edit physician'
        ]);
    }
}
