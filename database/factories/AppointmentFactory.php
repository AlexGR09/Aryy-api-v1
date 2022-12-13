<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'physician_id' => 3,
            'specialty_id' => 1,
            'appointment_date' => now(),
            'address' => 'Enrique segoviano',
            'status' => 'scheduled'
        ];
    }
}
