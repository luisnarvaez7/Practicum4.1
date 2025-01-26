<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class CrearUsuarioTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_user_can_be_created_in_memory()
    {
          // Datos del usuario que queremos crear
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
        ];

        // Crear el usuario en memoria (sin guardarlo en la base de datos)
        $user = new User($userData);

        // Verifica que los atributos estén correctamente asignados
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('testuser@example.com', $user->email);

        // Verifica que no tiene un ID, ya que no está guardado en la base de datos
        $this->assertNull($user->id);
    }
}