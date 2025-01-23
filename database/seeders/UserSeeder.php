<?php
namespace Database\Seeders;

use App\Models\DoctorSpecialization;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        $doctors = User::factory(10)->create();

        $doctorRole = Role::where('name', 'Doctor')->first();

        foreach ($doctors as $doctor) {
            $doctor->assignRole($doctorRole);
            DoctorSpecialization::factory()->create(['doctor_id' => $doctor->id]);
        }
    }
}
