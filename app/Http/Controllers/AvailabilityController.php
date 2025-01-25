<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use App\Models\User;

class AvailabilityController extends Controller
{
    // Listar disponibilidad de doctores
    public function index()
    {
        $availabilities = Availability::paginate(5); // Cambiado para agregar paginación
        return view('admin.availability.index', compact('availabilities'));
    }

    // Crear disponibilidad
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'day_of_week' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $availability = Availability::create($validated);
        return response()->json(['message' => 'Disponibilidad creada con éxito', 'availability' => $availability], 201);
    }

    // Mostrar formulario para crear disponibilidad
    public function create()
    {
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->get();

        return view('admin.availability.create', compact('doctors'));
    }

    // Mostrar formulario para editar disponibilidad
    public function edit($id)
    {
        $availability = Availability::findOrFail($id);
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->get();

        return view('admin.availability.edit', compact('availability', 'doctors'));
    }

    // Actualizar disponibilidad
    public function update(Request $request, $id)
    {
        $availability = Availability::findOrFail($id);

        $validated = $request->validate([
            'day_of_week' => 'nullable|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
        ]);

        $availability->update($validated);
        return response()->json(['message' => 'Disponibilidad actualizada con éxito', 'availability' => $availability], 200);
    }

    // Eliminar disponibilidad
    public function destroy($id)
    {
        $availability = Availability::findOrFail($id);
        $availability->delete();

        return response()->json(['message' => 'Disponibilidad eliminada con éxito'], 200);
    }
}
