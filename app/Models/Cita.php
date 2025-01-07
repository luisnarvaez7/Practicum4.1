<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'fecha',
        'hora',
        'id_doctor',
        'id_paciente',
        'motivo',
    ];

    // Relación con el modelo Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    // Relación con el modelo Patient
    public function paciente()
    {
        return $this->belongsTo(Patient::class, 'id_paciente');
    }
}
