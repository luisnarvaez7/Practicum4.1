<?php
namespace Database\Seeders;

use App\Models\DoctorSpecialization;
use App\Models\Specialization;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    public function run()
    {
        $usuarios = User::factory(100)->create();
        $doctors = User::factory(10)->create();

        $doctorRole = Role::where('name', 'doctor')->first();
        $specializations = Specialization::all();

        if (Schema::hasTable('doctor_specializations')) {
            $doctorSpecializations = [];
            foreach ($doctors as $doctor) {
                $doctor->assignRole($doctorRole);
                $doctorSpecializations[] = [
                    'doctor_id' => $doctor->id,
                    'specialization_id' => $specializations->random()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DoctorSpecialization::insert($doctorSpecializations);
        } else {
            $this->command->warn('Table doctor_specializations does not exist.');
        }

        $roles = Role::all();
        foreach ($usuarios as $usuario) {
            $usuario->assignRole($roles->random());
            if (!$usuario->hasRole('doctor')) {
                $usuario->specializations()->attach($specializations->random()->id);
            }
        }
    }
}
