<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    use HasFactory;

    protected $fillable = [
        'datos',
        'fecha',
        'tipo',
    ];

    public function historialMedico()
    {
        return $this->hasMany(HistorialMedico::class, 'estadistica_id');
    }
}
