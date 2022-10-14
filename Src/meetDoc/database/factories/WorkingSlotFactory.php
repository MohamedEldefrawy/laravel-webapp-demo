<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkingSlot>
 */
class WorkingSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'break_time_in_minutes'=> 10,
            'start_time' => $this->faker->time,
            'slot_duration' => 20,
            'week_day_id' => $this->faker->numberBetween(1,7),
            'doctor_service_id' => rand(1,3),
        ];
    }
}
