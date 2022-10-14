<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     * @author Mohamed Eldefrawy
     */
    public function definition(): array
    {
        return [
            "note" => $this->faker->text,
            "patient_id" => rand(1, 10)
        ];
    }
}
