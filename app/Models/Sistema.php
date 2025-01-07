<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    use HasFactory;

    protected $fillable = [
        'baseDatos',
        'configuracion',
        'red',
        'servidor',
    ];

    public function estadisticas()
    {
        return $this->hasMany(Estadistica::class);
    }
}
