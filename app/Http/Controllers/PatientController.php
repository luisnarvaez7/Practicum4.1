<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Muestra la lista de pacientes.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Muestra el formulario para crear un nuevo paciente.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Guarda un nuevo paciente en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
            'direccion' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'fechaNacimiento' => 'required|date',
            'genero' => 'required|string|max:255',
            'historialMedico' => 'nullable|string',
        ]);

        Patient::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'direccion' => $request->direccion,
            'edad' => $request->edad,
            'fechaNacimiento' => $request->fechaNacimiento,
            'genero' => $request->genero,
            'historialMedico' => $request->historialMedico,
        ]);

        return redirect()->route('patients.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Muestra los detalles de un paciente específico.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Muestra el formulario para editar un paciente.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Actualiza los datos de un paciente en la base de datos.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->id,
            'direccion' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'fechaNacimiento' => 'required|date',
            'genero' => 'required|string|max:255',
            'historialMedico' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Elimina un paciente de la base de datos.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
