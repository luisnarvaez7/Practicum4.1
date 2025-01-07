<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Patient extends User
{
    protected $fillable = [
        'direccion',
        'edad',
        'fechaNacimiento',
        'genero',
        'historialMedico',
    ];

    /**
     * Relaciones o métodos adicionales específicos de la clase Patient.
     */
}

