<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::whereHas('Physician')->inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'extension' => '52',
            'attetion_time' => fake()->text(20),
            'zipcode' => rand(5, 5),
            'state' => fake()->text(10),
            'city' => fake()->city(),
            'town' => fake()->city(),
            'street' => fake()->streetAddress(),
            'exterior_no' => rand(1, 4),
            'interior_no' => rand(1, 4),
            'references' => fake()->text(30),
            'accesibility' => fake()->text(40),
            'public_target' => fake()->text(20),
            'services' => fake()->text(20),
        ];
    }
}
