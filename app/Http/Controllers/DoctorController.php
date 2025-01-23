<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin')->only(['index', 'store', 'update', 'destroy']);
    }

    // Listar todos los doctores con filtros, búsqueda y paginación
    public function index(Request $request)
    {
        $query = User::role('doctor')->with('specializations');

        // Filtros
        if ($request->filled('specialization')) {
            $query->whereHas('specializations', function ($q) use ($request) {
                $q->where('specialization_id', $request->specialization);
            });
        }

        // Búsqueda
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Paginación
        $doctors = $query->paginate(10);

        $specializations = Specialization::all();
        return view('doctors.index', compact('doctors', 'specializations'));
    }

    // Crear un nuevo doctor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'specializations' => 'array',
            'specializations.*' => 'exists:specializations,id',
        ]);

        DB::transaction(function () use ($validated) {
            $doctor = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $doctor->assignRole('doctor');

            // Filtrar solo los IDs de especialización y sincronizarlos (sin la descripción)
            $specializations = Arr::pluck($validated['specializations'], 'id'); // Solo obtener los IDs
            $doctor->specializations()->sync($specializations);
        });

        return response()->json(['message' => 'Doctor creado con éxito'], 201);
    }

    // Actualizar un doctor
    public function update(Request $request, $id)
    {
        $doctor = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $doctor->id,
            'password' => 'sometimes|nullable|string|min:8',
            'specializations' => 'array',
            'specializations.*' => 'exists:specializations,id',
        ]);

        DB::transaction(function () use ($validated, $doctor) {
            $doctor->update([
                'name' => $validated['name'] ?? $doctor->name,
                'email' => $validated['email'] ?? $doctor->email,
                'password' => isset($validated['password']) ? Hash::make($validated['password']) : $doctor->password,
            ]);

            // Filtrar solo los IDs de especialización y sincronizarlos (sin la descripción)
            $specializations = Arr::pluck($validated['specializations'], 'id'); // Solo obtener los IDs
            $doctor->specializations()->sync($specializations);
        });

        return response()->json(['message' => 'Doctor actualizado con éxito'], 200);
    }

    // Eliminar un doctor
    public function destroy($id)
    {
        $doctor = User::findOrFail($id);

        DB::transaction(function () use ($doctor) {
            $doctor->specializations()->detach();
            $doctor->delete();
        });

        return response()->json(['message' => 'Doctor eliminado con éxito'], 200);
    }
}
