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
            "start_date_time"=> $this->faker->date(),
            "end_date_time" => $this->faker->date(),
            'created_by' => 1,
            'patient_id' => rand(1, 10),
            'status_id' => rand(1, 10),
            'doctor_service_id' => rand(1, 10),
            'active' => true,
        ];
    }
}
