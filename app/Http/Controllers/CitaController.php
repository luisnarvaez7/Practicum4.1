<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Muestra una lista de citas.
     */
    public function index()
    {
        $citas = Cita::with('doctor', 'paciente')->get();
        return view('citas.index', compact('citas'));
    }

    /**
     * Muestra el formulario para crear una nueva cita.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $pacientes = Patient::all();
        return view('citas.create', compact('doctores', 'pacientes'));
    }

    /**
     * Almacena una nueva cita en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required|boolean',
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'id_doctor' => 'required|exists:doctors,id',
            'id_paciente' => 'required|exists:patients,id',
            'motivo' => 'required|string|max:255',
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada con éxito.');
    }

    /**
     * Muestra los detalles de una cita.
     */
    public function show(Cita $cita)
    {
        return view('citas.show', compact('cita'));
    }

    /**
     * Muestra el formulario para editar una cita existente.
     */
    public function edit(Cita $cita)
    {
        $doctores = Doctor::all();
        $pacientes = Patient::all();
        return view('citas.edit', compact('cita', 'doctores', 'pacientes'));
    }

    /**
     * Actualiza una cita en la base de datos.
     */
    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'estado' => 'required|boolean',
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'id_doctor' => 'required|exists:doctors,id',
            'id_paciente' => 'required|exists:patients,id',
            'motivo' => 'required|string|max:255',
        ]);

        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada con éxito.');
    }

    /**
     * Elimina una cita de la base de datos.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada con éxito.');
    }
}
