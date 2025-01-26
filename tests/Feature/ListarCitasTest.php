<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListarCitasTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_listarCitas(): void
    {
        $response = $this->get('/admin/appointments');

        $response->assertStatus(302, 'lista de citas no se pudo obtener');
    }
}
