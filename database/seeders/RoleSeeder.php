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
        // ROLES
        $role1 = Role::create(['name' => 'Administrator']);
        $role2 = Role::create(['name' => 'User']);
        $role3 = Role::create(['name' => 'NewPatient']);
        $role4 = Role::create(['name' => 'NewPhysician']);
        $role5 = Role::create(['name' => 'Patient']);
        $role6 = Role::create(['name' => 'Physician']);
        
        


        // PERMISOS ADMINSTRADOR
        $permission1 = Permission::create(['name' => 'show roles']);
        $permission2 = Permission::create(['name' => 'create roles']);
        $permission3 = Permission::create(['name' => 'edit roles']);
        $permission4 = Permission::create(['name' => 'delete roles']);

        $permission5 = Permission::create(['name' => 'show permissions']);
        $permission6 = Permission::create(['name' => 'create permissions']);
        $permission7 = Permission::create(['name' => 'edit permissions']);
        $permission8 = Permission::create(['name' => 'delete permissions']);

        $permission9 = Permission::create(['name' => 'show users']);
        $permission10 = Permission::create(['name' => 'create users']);
        $permission11 = Permission::create(['name' => 'edit users']);
        $permission12 = Permission::create(['name' => 'delete users']);

        // PERMISOS PARA EL REGISTRO DE USUARIO
        $permission13 = Permission::create(['name' => 'show profile']);
        $permission14 = Permission::create(['name' => 'edit profile']);
        $permission15 = Permission::create(['name' => 'delete profile']);

        //PERMISOS PARA LOS CATÁLOGOS

        //ESPECIALIDADES
        $permission20 = Permission::create(['name' => 'show specialitites']);
        $permission21 = Permission::create(['name' => 'create specialitites']);
        $permission22 = Permission::create(['name' => 'edit specialitites']);
        $permission23 = Permission::create(['name' => 'delete specialitites']);

        //ENFERMEDADES
        $permission24 = Permission::create(['name' => 'show diseases']);
        $permission25 = Permission::create(['name' => 'create diseases']);
        $permission26 = Permission::create(['name' => 'edit diseases']);
        $permission27 = Permission::create(['name' => 'delete diseases']);

        //SERVICIOS MEDICOS
        $permission28 = Permission::create(['name' => 'show medical services']);
        $permission29 = Permission::create(['name' => 'create medical services']);
        $permission30 = Permission::create(['name' => 'edit medical services']);
        $permission31 = Permission::create(['name' => 'delete medical services']);

        //ALERGIAS
        $permission32 = Permission::create(['name' => 'show alergies']);
        $permission33 = Permission::create(['name' => 'create alergies']);
        $permission34 = Permission::create(['name' => 'edit alergies']);
        $permission35 = Permission::create(['name' => 'delete alergies']);

        //OCUPACIONES
        $permission36 = Permission::create(['name' => 'show ocupations']);
        $permission37 = Permission::create(['name' => 'create ocupations']);
        $permission38 = Permission::create(['name' => 'edit ocupations']);
        $permission39 = Permission::create(['name' => 'delete ocupations']);

        //SEGUROS MEDICOS
        $permission40 = Permission::create(['name' => 'show insurances']);
        $permission41 = Permission::create(['name' => 'create insurances']);
        $permission42 = Permission::create(['name' => 'edit insurances']);
        $permission43 = Permission::create(['name' => 'delete insurances']);

        // PAISES
        $permission44 = Permission::create(['name' => 'show countries']);
        $permission45 = Permission::create(['name' => 'create countries']);
        $permission46 = Permission::create(['name' => 'edit countries']);
        $permission47 = Permission::create(['name' => 'delete countries']);

        // ESTADOS
        $permission48 = Permission::create(['name' => 'show states']);
        $permission49 = Permission::create(['name' => 'create states']);
        $permission50 = Permission::create(['name' => 'edit states']);
        $permission51 = Permission::create(['name' => 'delete states']);

        // CUIDADES
        $permission52 = Permission::create(['name' => 'show cities']);
        $permission53 = Permission::create(['name' => 'create cities']);
        $permission54 = Permission::create(['name' => 'edit cities']);
        $permission55 = Permission::create(['name' => 'delete cities']);

        // NUEVOS USUARIOS
        $permission56 = Permission::create(['name' => 'complete patient profile']);
        $permission57 = Permission::create(['name' => 'complete physician profile']);

        // PACIENTES
        $permission58 = Permission::create(['name' => 'show patient']);
        $permission59 = Permission::create(['name' => 'edit patient']);

        // MEDICOS
        $permission60 = Permission::create(['name' => 'show physician']);
        $permission61 = Permission::create(['name' => 'edit physician']);

        
        // $permission57 = Permission::create(['name' => 'show profile patient']);
        // $permission58 = Permission::create(['name' => 'delete profile patient']);


        // ASIGNAR ROLES Y PERMISOS A USUARIOS (SE ASIGNARÁN MÁS PERMISOS COMO SE REQUIERAN)

        // ADMINISTRADOR
        $role1->givePermissionTo(Permission::all());

        // USER
        $role2->givePermissionTo([$permission13,$permission14,$permission15]);

        // NUEVO PACIENTE
        $role3->givePermissionTo([$permission56]);

        // NUEVO MÉDICO
        $role4->givePermissionTo([$permission57]);

        // PACIENTE
        $role5->givePermissionTo([$permission58, $permission59]);

        // MÉDICO
        $role6->givePermissionTo([$permission60, $permission61]);


        // ASIGNANDO ROLES A USUARIOS
        $user1 = User::where('id', 1)->first();
        $user1->assignRole($role1);

        $user2 = User::where('id', 2)->first();
        $user2->assignRole([$role2, $role3]);

    }
}
