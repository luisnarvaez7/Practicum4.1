<?php

namespace Database\Factories;

use App\Models\DoctorSpecialization;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorSpecializationFactory extends Factory
{
    protected $model = DoctorSpecialization::class;

    public function definition()
    {
        return [
            'doctor_id' => \App\Models\User::factory(),
            'specialization_id' => \App\Models\Specialization::factory(),
        ];
    }
}
