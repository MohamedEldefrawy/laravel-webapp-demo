<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PatientSymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     * @author Mohamed Eldefrawy
     */
    public function definition(): array
    {
        return [
            'symptom' => $this->faker->text(),
            'created_by' => 1,
            'patient_id' => rand(1, 10),
        ];
    }
}
