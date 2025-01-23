<?php
namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si ya hay un usuario autenticado
        $user = User::first(); // O puedes crear un usuario si no existe

        $team = Team::create([
            'name' => 'Team Example',
            'user_id' => $user->id,  // Asocia el primer usuario
            'personal_team' => false, // Asegúrate de proporcionar este valor
        ]);
    }
}
