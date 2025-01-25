<?php

namespace Database\Factories;

use App\Models\MedicalHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalHistoryFactory extends Factory
{
    protected $model = MedicalHistory::class;

    public function definition()
    {
        return [
            'patient_id' => \App\Models\User::factory(),
            'doctor_id' => \App\Models\User::factory(),
            'appointment_id' => \App\Models\Appointment::factory(),
            'notes' => $this->faker->paragraph,
            'created_at' => now(),
                ];
    }
}
