<?php

namespace App\Http\Controllers;

use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    public function index()
    {
        $historiales = HistorialMedico::all();
        return view('historialmedico.index', compact('historiales'));
    }

    public function show($id)
    {
        $historial = HistorialMedico::findOrFail($id);
        return view('historialmedico.show', compact('historial'));
    }

    public function create()
    {
        return view('historialmedico.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'diagnostico' => 'required|int',
            'Fechadeactualizacion' => 'required|int',
            'id_paciente' => 'required|int',
            'tratamiento' => 'required|string',
        ]);

        HistorialMedico::create($request->all());
        return redirect()->route('historialmedico.index');
    }

    public function edit($id)
    {
        $historial = HistorialMedico::findOrFail($id);
        return view('historialmedico.edit', compact('historial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'diagnostico' => 'required|int',
            'Fechadeactualizacion' => 'required|int',
            'tratamiento' => 'required|string',
        ]);

        $historial = HistorialMedico::findOrFail($id);
        $historial->update($request->all());
        return redirect()->route('historialmedico.index');
    }

    public function destroy($id)
    {
        $historial = HistorialMedico::findOrFail($id);
        $historial->delete();
        return redirect()->route('historialmedico.index');
    }
}
