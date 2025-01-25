<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function doctors()
    {
        return $this->belongsToMany(User::class, 'doctor_specialization', 'specialization_id', 'doctor_id');
    }
}
