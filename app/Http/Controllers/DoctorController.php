<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Muestra una lista de doctores.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Muestra el formulario para crear un nuevo doctor.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Almacena un nuevo doctor en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'especialidad' => 'required|string|max:255',
            'horario' => 'required|integer',
            'password' => 'required|string|min:8',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor creado con éxito.');
    }

    /**
     * Muestra los detalles de un doctor.
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Muestra el formulario para editar un doctor existente.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Actualiza un doctor en la base de datos.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $doctor->id,
            'especialidad' => 'required|string|max:255',
            'horario' => 'required|integer',
        ]);

        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor actualizado con éxito.');
    }

    /**
     * Elimina un doctor de la base de datos.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor eliminado con éxito.');
    }
}
