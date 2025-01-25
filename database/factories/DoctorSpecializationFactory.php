<?php

namespace Database\Factories;

use App\Models\DoctorSpecialization;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorSpecializationFactory extends Factory
{
    protected $model = DoctorSpecialization::class;

    public function definition()
    {
        return [
            'doctor_id' => User::factory(),
            'specialization_id' => Specialization::factory(),
        ];
    }
}

