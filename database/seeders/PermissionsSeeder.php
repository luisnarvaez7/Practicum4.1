<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $permissions = [
            ['name'=>'view roles', 'description'=>'ver roles'],
            ['name'=>'create roles', 'description'=>'crear roles'],
            ['name'=>'edit roles', 'description'=>'editar roles'],
            ['name'=>'delete roles', 'description'=>'eliminar roles'],
            ['name'=>'view users', 'description'=>'ver usuarios'],
            ['name'=>'edit users', 'description'=>'editar usuarios'],
            ['name'=>'delete users', 'description'=>'eliminar usuarios'],
            ['name'=>'create users', 'description'=>'crear usuarios'],
            ['name'=>'admin.users.index','description'=>'ver listado de usuarios'],
            ['name'=>'admin.users.create','description'=>'crear usuarios'],
            ['name'=>'admin.users.edit','description'=>'editar usuarios'],
            ['name'=>'admin.users.destroy','description'=>'eliminar usuarios'],
            ['name'=>'admin.roles.index','description'=>'ver listado de roles'],
            ['name'=>'admin.roles.create','description'=>'crear roles'],
            ['name'=>'admin.roles.edit','description'=>'editar roles'],
            ['name'=>'admin.roles.destroy','description'=>'eliminar roles'],
            ['name'=>'admin.patients.index','description'=>'ver listado de pacientes'],
            ['name'=>'admin.patients.create','description'=>'crear pacientes'],
            ['name'=>'admin.patients.edit','description'=>'editar pacientes'],
            ['name'=>'admin.patients.destroy','description'=>'eliminar pacientes'],
            ['name'=>'admin.doctors.index','description'=>'ver listado de doctores'],
            ['name'=>'admin.doctors.create','description'=>'crear doctores'],
            ['name'=>'admin.doctors.edit','description'=>'editar doctores'],
            ['name'=>'admin.doctors.destroy','description'=>'eliminar doctores'],
        ];

        $admin = Role::findByName('admin');

        $totalCreados = 0;
        foreach ($permissions as $permiso) {
            $permisoBuscado  = Permission::where('name', $permiso['name'])->first();

            if (!$permisoBuscado) {
                Permission::create($permiso)->assignRole($admin);
                $this->command->info('Permiso creado para: ' . $permiso['name']);
                $totalCreados++;
            }
        }

        $this->command->info('Total permisos creados: ' . $totalCreados);
    }
}
