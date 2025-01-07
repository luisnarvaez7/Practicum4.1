<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    public function index()
    {
        $estadisticas = Estadistica::all();
        return view('estadisticas.index', compact('estadisticas'));
    }

    public function show($id)
    {
        $estadistica = Estadistica::findOrFail($id);
        $historiales = $estadistica->historialMedico;
        return view('estadisticas.show', compact('estadistica', 'historiales'));
    }

    public function create()
    {
        return view('estadisticas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'datos' => 'required|boolean',
            'fecha' => 'required|int',
            'tipo' => 'required|string|max:255',
        ]);

        Estadistica::create($request->all());
        return redirect()->route('estadisticas.index');
    }

    public function edit($id)
    {
        $estadistica = Estadistica::findOrFail($id);
        return view('estadisticas.edit', compact('estadistica'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'datos' => 'required|boolean',
            'fecha' => 'required|int',
            'tipo' => 'required|string|max:255',
        ]);

        $estadistica = Estadistica::findOrFail($id);
        $estadistica->update($request->all());
        return redirect()->route('estadisticas.index');
    }

    public function destroy($id)
    {
        $estadistica = Estadistica::findOrFail($id);
        $estadistica->delete();
        return redirect()->route('estadisticas.index');
    }
}
