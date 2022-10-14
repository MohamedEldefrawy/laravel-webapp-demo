<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ClinicPatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_code' => $this->faker->name(),
            'created_by' => 1,
            'patient_id' => rand(1, 68),
            'clinic_id' => rand(1, 10)
        ];
    }
}
