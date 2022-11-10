<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@email.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "admin";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Paciente";
        $user->email = "paciente@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();
//medicos
        $user = new User();
        $user->name = "Medico";
        $user->email = "medico@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Fulanito";
        $user->email = "medicofulanito@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Menganito";
        $user->email = "medicomenganito@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Armando";
        $user->email = "medicoarmandobroncas@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "Bromcas";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Daniel";
        $user->email = "medicodaniel@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Marco";
        $user->email = "medicomarco@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Angel";
        $user->email = "medicoangel@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Miguel";
        $user->email = "medicomiguel@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Joel";
        $user->email = "medicojoel@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Alejandro";
        $user->email = "medicoalejandro@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        //pacientes
        $user = new User();
        $user->name = "Juan Jose";
        $user->email = "juan_j@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Jose I.";
        $user->email = "josei@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Marta";
        $user->email = "marta@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Femenino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Luz M.";
        $user->email = "luz_m@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Femenino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Josue";
        $user->email = "josue@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Maria";
        $user->email = "maria@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Femenino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Fernanda";
        $user->email = "fernanda@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Femenino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Maximiliano";
        $user->email = "max@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Daniela";
        $user->email = "daniela@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Femenino";
        $user->birthday = "1990-02-10";
        $user->save();

        $user = new User();
        $user->name = "Marco Antonio";
        $user->email = "marco_a@gmail.com";
        $user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";// password
        $user->last_name = "prueba";
        $user->gender = "Masculino";
        $user->birthday = "1990-02-10";
        $user->save();


        // ASIGNANDO ROLES A USUARIOS
        $user1 = User::where('id', 1)->first();
        $user1->assignRole(['Administrator']);
//medicos

        //pacientes
        $user2 = User::where('id', 2)->first();
        $user2->assignRole(['User', 'NewPatient']);
    }
}
