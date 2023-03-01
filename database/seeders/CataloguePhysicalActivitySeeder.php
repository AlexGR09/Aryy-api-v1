<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CataloguePhysicalActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('physical_activities')->insert([
            [
                'name' => 'Artes marciales mixtas'
            ],
            [
                'name' => 'Baile'
            ],
            [
                'name' => 'Baile contemporáneo'
            ],  
            [
                'name' => 'Baile de bachata'
            ],
            [
                'name' => 'Baile de breakdance'
            ],   
            [
                'name' => 'Baile de cumbia'
            ],
            [
                'name' => 'Baile de Hip hop'
            ],
            [
                'name' => 'Baile de salsa'
            ],
            [
                'name' => 'Baile Twerk'
            ],
            [
                'name' => 'Ballet'
            ],
            [
                'name' => 'Baloncesto'
            ],
            [
                'name' => 'Basketball'
            ],
            [
                'name' => 'Béisbol'
            ],
            [
                'name' => 'Boxeo'
            ],
            [
                'name' => 'Buceo'
            ],
            [
                'name' => 'Calistenia'
            ],
            [
                'name' => 'Caminar'
            ],
            [
                'name' => 'Caminata en montaña'
            ],
            [
                'name' => 'Ciclismo'
            ],
            [
                'name' => 'Correr'
            ],
            [
                'name' => 'CrossFit'
            ],
            [
                'name' => 'Entrenamiento funcional'
            ],
            [
                'name' => 'Equitación'
            ],
            [
                'name' => 'Escalada'
            ],
            [
                'name' => 'Espeleología'
            ],
            [
                'name' => 'Esquí'
            ],
            [
                'name' => 'Esquí acuático'
            ],
            [
                'name' => 'Futbol americano'
            ],
            [
                'name' => 'Futbol soccer'
            ],
            [
                'name' => 'Gimnasia'
            ],
            [
                'name' => 'Gimnasia rítmica'
            ],
            [
                'name' => 'Golf'
            ],
            [
                'name' => 'Hockey'
            ],
            [
                'name' => 'Levantamiento de pesas'
            ],
            [
                'name' => 'Lucha libre'
            ],
            [
                'name' => 'Natación'
            ],
            [
                'name' => 'Paracaidismo'
            ],
            [
                'name' => 'Parkour'
            ],
            [
                'name' => 'Patinaje artístico'
            ],
            [
                'name' => 'Patinaje sobre ruedas'
            ],
            [
                'name' => 'Pesca deportiva'
            ],
            [
                'name' => 'Pilates'
            ],
            [
                'name' => 'Pole dance'
            ],
            [
                'name' => 'Raquetbol'
            ],
            [
                'name' => 'Rugby'
            ],
            [
                'name' => 'Senderismo'
            ],
            [
                'name' => 'Spinning'
            ],
            [
                'name' => 'Surf'
            ],
            [
                'name' => 'Tai chi'
            ],
            [
                'name' => 'Tenis'
            ],
            [
                'name' => 'Tiro con arco'
            ],
            [
                'name' => 'Voleibol'
            ],
            [
                'name' => 'Volleyball'
            ],
            [
                'name' => 'Yoga'
            ],
            [
                'name' => 'Zumba'
            ], 
        ]);
    }
}
