<?php

namespace App\Http\Controllers;

use App\Models\DoctorSpecialization;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    // Listar especialidades
    public function index()
    {
        $specializations = Specialization::all();
        return response()->json($specializations, 200);
    }

    // Asociar especialidades a un doctor
    public function assignSpecialization(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        $relation = DoctorSpecialization::create($validated);
        return response()->json(['message' => 'Especialización asignada con éxito', 'relation' => $relation], 201);
    }

    // Eliminar asociación de especialidad
    public function removeSpecialization($id)
    {
        $relation = DoctorSpecialization::findOrFail($id);
        $relation->delete();

        return response()->json(['message' => 'Especialización eliminada con éxito'], 200);
    }
}
