<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'weight' => rand(50, 100),
            'height' => rand(100, 200),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => rand(1, 100),
            'blood_type' => 'B',
            "first_name" => $this->faker->name(),
            "last_name" => $this->faker->name(),
            "user_id" => $this->faker->unique()->numberBetween(32, 100),
            "created_by" => 1,
        ];
    }
}
