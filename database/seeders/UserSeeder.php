<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{

    public function run()
    {
        Storage::deleteDirectory('users');

        $user = new User();
        // $user->full_name = "admin";
        $user->email = "admin@email.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Paciente";
        $user->email = "paciente@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();
        //medicos
        $user = new User();
        // $user->full_name = "Medico";
        $user->email = "medico@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Fulanito";
        $user->email = "medicofulanito@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Menganito";
        $user->email = "medicomenganito@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Armando";
        $user->email = "medicoarmandobroncas@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Daniel";
        $user->email = "medicodaniel@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Marco";
        $user->email = "medicomarco@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Angel";
        $user->email = "medicoangel@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Miguel";
        $user->email = "medicomiguel@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Joel";
        $user->email = "medicojoel@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Alejandro";
        $user->email = "medicoalejandro@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        //pacientes
        $user = new User();
        // $user->full_name = "Juan Jose";
        $user->email = "juan_j@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Jose I.";
        $user->email = "josei@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Marta";
        $user->email = "marta@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Femenino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Luz M.";
        $user->email = "luz_m@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Femenino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Josue";
        $user->email = "josue@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Maria";
        $user->email = "maria@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Femenino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Fernanda";
        $user->email = "fernanda@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Femenino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Maximiliano";
        $user->email = "max@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Daniela";
        $user->email = "daniela@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Femenino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();

        $user = new User();
        // $user->full_name = "Marco Antonio";
        $user->email = "marco_a@gmail.com";
        $user->password = "password"; // password
        // $user->gender = "Masculino";
        // $user->birthday = "1990-02-10";
        $user->phone_number = fake()->regexify('[0-9]{10}');
        $user->country_code = "+70";
        $user->save();


        // ASIGNANDO ROLES A USUARIOS
        $user1 = User::where('id', 1)->first();
        $user1->assignRole(['Administrator']);

        //medicos
        $medico = User::where('id', 3)->first();
        $medico->assignRole(['User', 'Physician']);

        $medico2 = User::where('id', 4)->first();
        $medico2->assignRole(['User', 'Physician']);

        $medico5 = User::where('id', 5)->first();
        $medico5->assignRole(['User', 'Physician']);

        $medico6 = User::where('id', 6)->first();
        $medico6->assignRole(['User', 'Physician']);

        $medico7 = User::where('id', 7)->first();
        $medico7->assignRole(['User', 'Physician']);

        $medico8 = User::where('id', 8)->first();
        $medico8->assignRole(['User', 'Physician']);

        $medico9 = User::where('id', 9)->first();
        $medico9->assignRole(['User', 'Physician']);

        $medico10 = User::where('id', 10)->first();
        $medico10->assignRole(['User', 'Physician']);

        $medico11 = User::where('id', 11)->first();
        $medico11->assignRole(['User', 'Physician']);

        $medico12 = User::where('id', 12)->first();
        $medico12->assignRole(['User', 'Physician']);

        //pacientes
        $patient = User::where('id', 13)->first();
        $patient->assignRole(['User', 'NewPatient']);

        $patient2 = User::where('id', 14)->first();
        $patient2->assignRole(['User', 'NewPatient']);

        $patient3 = User::where('id', 15)->first();
        $patient3->assignRole(['User', 'NewPatient']);

        $patient4 = User::where('id', 16)->first();
        $patient4->assignRole(['User', 'NewPatient']);

        $patient6 = User::where('id', 17)->first();
        $patient6->assignRole(['User', 'NewPatient']);

        $patient7 = User::where('id', 18)->first();
        $patient7->assignRole(['User', 'Patient']);

        $patient8 = User::where('id', 19)->first();
        $patient8->assignRole(['User', 'Patient']);

        $patient9 = User::where('id', 20)->first();
        $patient9->assignRole(['User', 'Patient']);

        $patient10 = User::where('id', 21)->first();
        $patient10->assignRole(['User', 'Patient']);

        $patient11 = User::where('id', 22)->first();
        $patient11->assignRole(['User', 'Patient']);
    }
}
