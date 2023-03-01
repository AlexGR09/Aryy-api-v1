<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostnatalBackgroundSeeder extends Seeder
{
    public function run()
    {
        $type_of_feeding = [
            'formula' => false,
            'breastfeed' => true,
            'both' => false,
        ];
        DB::table('postnatal_backgrounds')->insert([
            [
           
                'delivery_details' => 'no me dolió',
                'baby_name' => 'stewie',
                'baby_weight' => '3 kg',
                'baby_health' => 'sanito',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
               
                'delivery_details' => 'si me dolió',
                'baby_name' => 'dewey',
                'baby_weight' => '2.7 kg',
                'baby_health' => 'sanito',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
            
                'delivery_details' => 'si me dolió',
                'baby_name' => 'hermione',
                'baby_weight' => '2.6 kg',
                'baby_health' => 'sanita',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
   
                'delivery_details' => 'no me dolió',
                'baby_name' => 'annie',
                'baby_weight' => '2.5 kg',
                'baby_health' => 'sanita',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
               
                'delivery_details' => 'si me dolió',
                'baby_name' => 'george',
                'baby_weight' => '2.7 kg',
                'baby_health' => 'sanito',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
                
                'delivery_details' => 'si me dolió',
                'baby_name' => 'bryan',
                'baby_weight' => '2.9 kg',
                'baby_health' => 'sanito',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
              
                'delivery_details' => 'si me dolió',
                'baby_name' => 'glen',
                'baby_weight' => '3.2 kg',
                'baby_health' => 'sanito',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
         
                'delivery_details' => 'si me dolió',
                'baby_name' => 'ronald',
                'baby_weight' => '3.0 kg',
                'baby_health' => 'sanito',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
                
                'delivery_details' => 'si me dolió',
                'baby_name' => 'stevie',
                'baby_weight' => '2.7 kg',
                'baby_health' => 'sanito',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
            [
               
                'delivery_details' => 'si me dolió',
                'baby_name' => 'maggie',
                'baby_weight' => '3.3 kg',
                'baby_health' => 'sanita',
                'type_of_feeding' => json_encode($type_of_feeding),
                'emotonial_state' => 'bien',
            ],
        ]);
    }
}
