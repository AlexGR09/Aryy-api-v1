<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROLES
        $role1 = Role::create(['name' => 'Administrator']);
        $role2 = Role::create(['name' => 'Patient']);
        $role3 = Role::create(['name' => 'Physician']);


        // PERMISOS
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

        // PERMISOS DEL AUTHCONTROLLER
        $permission13 = Permission::create(['name' => 'show profile']);
        // $permission14 = Permission::create(['name' => 'create profile']);
        $permission14 = Permission::create(['name' => 'edit profile']);
        $permission15 = Permission::create(['name' => 'delete profile']);



        // ASIGNAR ROLES Y PERMISOS A USUARIOS
        // $role1->givePermissionTo([
        //         $permission1, 
        //         $permission2, 
        //         $permission3,
        //         $permission4,
        //         $permission5,
        //         $permission6, 
        //         $permission7,
        //         $permission8,
        //         $permission9,
        //         $permission10,
        //         $permission7,
        //         $permission7,
        //         $permission8 ]);
        $role1->givePermissionTo(Permission::all());
        $user1 = User::where('id', 1)->first();
        $user1->assignRole('Administrator');

        $role2->givePermissionTo([$permission13, $permission14, $permission15]);
        $user2 = User::where('id', 2)->first();
        $user2->assignRole('Patient');

        $role3->givePermissionTo([$permission13, $permission14, $permission15]);
    }
}