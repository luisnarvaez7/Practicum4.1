<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'doctor', 'guard_name' => 'web'],
            ['name' => 'patient', 'guard_name' => 'web'],
            ['name' => 'nurse', 'guard_name' => 'web'],
            ['name' => 'pharmacist', 'guard_name' => 'web'],
            ['name' => 'receptionist', 'guard_name' => 'web'],
            ['name' => 'laboratorist', 'guard_name' => 'web'],
            ['name' => 'accountant', 'guard_name' => 'web'],
            ['name' => 'visitor', 'guard_name' => 'web'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name'], 'guard_name' => $role['guard_name']],
            );
        }
    }
}
