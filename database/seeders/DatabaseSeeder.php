<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,                 // Primero crear roles
            PermissionsSeeder::class,           // Luego permisos
            SpecializationsSeeder::class,       // Después especializaciones
            RoomSeeder::class,                  // Salas
            UserSeeder::class,
            CompanySeeder::class,
            ContactSeeder::class,// Luego usuarios
            DoctorSpecializationSeeder::class,  // Después asignación de especializaciones a doctores
            AvailabilitySeeder::class,          // Disponibilidad de doctores
            AppointmentSeeder::class,           // Citas
            RoomSeeder::class,                  // Salas
            MedicalHistorySeeder::class,        // Historias médicas
            InvoiceSeeder::class,               // Finalmente facturas
        ]);

        // Crear usuario admin si no existe
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'admin',
                'password' => bcrypt('12345678'), // Cambia la contraseña según tus necesidades
            ]
        );

        // Asignar rol de admin al usuario
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);
    }

}
