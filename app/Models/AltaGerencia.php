<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AltaGerencia extends Authenticatable
{
    use HasFactory;

    // Aquí se pueden añadir métodos específicos para Alta Gerencia.
    public function consultarEstadisticas()
    {
        // Lógica para consultar estadísticas
    }

    public function exportarReporte()
    {
        // Lógica para exportar reporte
    }

    public function generarReporte()
    {
        // Lógica para generar reporte
    }
}
