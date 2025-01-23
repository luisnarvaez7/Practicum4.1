<?php

namespace Database\Factories;

use App\Models\Availability;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabilityFactory extends Factory
{
    protected $model = Availability::class;

    public function definition()
    {
        return [
            'doctor_id' => \App\Models\User::factory(),
            'day_of_week' => $this->faker->numberBetween(0, 6),
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
        ];
    }
}
