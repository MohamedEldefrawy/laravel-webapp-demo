<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'years_of_experience' => rand(3, 5),
            'title' => $this->faker->title,
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'user_id' => $this->faker->unique()->numberBetween(2, 31),
            'department_id' => rand(1, 10),
            'created_by' => 1,
            'clinic_id' => rand(1, 10),
        ];
    }
}
