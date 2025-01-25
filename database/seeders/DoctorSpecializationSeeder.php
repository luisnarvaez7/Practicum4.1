<?php

namespace Database\Seeders;

use App\Models\DoctorSpecialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DoctorSpecializationSeeder extends Seeder
{
    public function run()
    {
        if (Schema::hasTable('doctor_specializations')) {
            DoctorSpecialization::factory()->count(10)->create();
        } else {
            $this->command->warn('Table doctor_specializations does not exist.');
        }
    }
}
