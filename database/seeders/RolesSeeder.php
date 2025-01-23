<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Doctor'],
            ['name' => 'User'],
            ['name' => 'Receptionist'],
            ['name' => 'Nurse'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

    }
}
