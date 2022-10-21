<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@email.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "admin";
        $user->sex = "Masculino";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();
        
        $user = new User();
        $user->name = "Paciente";
        $user->email = "paciente@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->sex = "Masculino";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Medico";
        $user->email = "medico@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->sex = "Masculino";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();
    }
}