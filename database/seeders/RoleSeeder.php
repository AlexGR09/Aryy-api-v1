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
        $role2 = Role::create(['name' => 'Patient']);
        $role3 = Role::create(['name' => 'NewPhysician']);
        $role4 = Role::create(['name' => 'PhysicianVerified']);


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

        // PERMISOS PARA EL MÉDICO AUTENTICADO
        $permission16 = Permission::create(['name' => 'show patients']);
        $permission17 = Permission::create(['name' => 'create patients']);
        $permission18 = Permission::create(['name' => 'edit patients']);
        $permission19 = Permission::create(['name' => 'delete patients']);


        // ASIGNAR ROLES Y PERMISOS A USUARIOS (SE ASIGNARÁN MÁS PERMISOS COMO SE REQUIERAN)
   
        $role1->givePermissionTo(Permission::all());
        $user1 = User::where('id', 1)->first();
        $user1->assignRole('Administrator');

        $role2->givePermissionTo([$permission13, $permission14, $permission15]);
        $user2 = User::where('id', 2)->first();
        $user2->assignRole('Patient');

        $role3->givePermissionTo([$permission13, $permission14, $permission15]);
        $user3 = User::where('id', 3)->first();
        $user3->assignRole('NewPhysician');

        $role4->givePermissionTo([$permission16, $permission17, $permission18, $permission19]);
    }
}