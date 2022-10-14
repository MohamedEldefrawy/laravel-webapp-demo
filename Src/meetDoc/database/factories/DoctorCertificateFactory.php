<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorCertificate>
 */
class DoctorCertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_id'=>rand(1,10),
            'details'=> $this->faker->text($maxNbChars = 50),
            'from'=>$this->faker->date('Y'),
            'to'=>$this->faker->date('Y'),
        ];
    }
}
