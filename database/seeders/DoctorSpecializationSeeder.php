<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoctorSpecialization;

class DoctorSpecializationSeeder extends Seeder
{
    public function run()
    {
        DoctorSpecialization::factory(10)->create();
    }
}
