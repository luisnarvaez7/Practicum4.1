<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'fecha',
        'mensaje',
        'tipo',
        'usuario_id',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
