<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use App\Models\MedicalHistory;
use App\Models\Room;
use App\Models\User;

class MedicalHistorySeeder extends Seeder
{
    public function run()
    {
        $patients = User::role('patient')->pluck('id')->toArray();
        $doctors = User::role('doctor')->pluck('id')->toArray();

        MedicalHistory::factory()->count(10)->create([
            'patient_id' => $patients[array_rand($patients)],
            'doctor_id' => $doctors[array_rand($doctors)],
            'appointment_id' => Appointment::all()->random()->id,
            'notes' => 'Sample notes',
        ]);
    }
}
