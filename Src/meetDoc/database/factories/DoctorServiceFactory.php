<?php

namespace Database\Factories;

use App\Models\DoctorService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'service_id' => rand(1, 3),
            'doctor_id' => rand(1, 5),
        ];
    }
}
