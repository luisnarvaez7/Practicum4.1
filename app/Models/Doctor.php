<?php

namespace App\Models;

use App\Models\User;

class Doctor extends User
{
    protected $fillable = [
        'especialidad',
        'horario',
    ];
}

