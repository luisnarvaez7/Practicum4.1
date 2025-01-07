<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnostico',
        'Fechadeactualizacion',
        'Id',
        'id_paciente',
        'tratamiento',
    ];

    public function paciente()
    {
        return $this->belongsTo(Patient::class, 'id_paciente');
    }

    public function cita()
    {
        return $this->hasOne(Cita::class, 'id');
    }

    public function medico()
    {
        return $this->belongsTo(Doctor::class, 'id');
    }
}
