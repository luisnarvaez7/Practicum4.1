<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    /**
     * Muestra una lista de secretarias.
     */
    public function index()
    {
        $secretarias = Secretaria::all();
        return view('secretarias.index', compact('secretarias'));
    }

    /**
     * Muestra el formulario para crear una nueva secretaria.
     */
    public function create()
    {
        return view('secretarias.create');
    }

    /**
     * Almacena una nueva secretaria en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        Secretaria::create($request->all());
        return redirect()->route('secretarias.index')->with('success', 'Secretaria creada con éxito.');
    }

    /**
     * Muestra los detalles de una secretaria.
     */
    public function show(Secretaria $secretaria)
    {
        return view('secretarias.show', compact('secretaria'));
    }

    /**
     * Muestra el formulario para editar una secretaria existente.
     */
    public function edit(Secretaria $secretaria)
    {
        return view('secretarias.edit', compact('secretaria'));
    }

    /**
     * Actualiza una secretaria en la base de datos.
     */
    public function update(Request $request, Secretaria $secretaria)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $secretaria->id,
        ]);

        $secretaria->update($request->all());
        return redirect()->route('secretarias.index')->with('success', 'Secretaria actualizada con éxito.');
    }

    /**
     * Elimina una secretaria de la base de datos.
     */
    public function destroy(Secretaria $secretaria)
    {
        $secretaria->delete();
        return redirect()->route('secretarias.index')->with('success', 'Secretaria eliminada con éxito.');
    }
}
