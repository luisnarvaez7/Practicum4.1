<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'doctor_id' => \App\Models\User::factory(),
            'patient_id' => \App\Models\User::factory(),
            'appointment_date' => $this->faker->dateTime,
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'cancelled']),
            'notes' => $this->faker->sentence,
        ];
    }
}
