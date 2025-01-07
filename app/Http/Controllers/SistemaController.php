<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function index()
    {
        $sistemas = Sistema::all();
        return view('sistemas.index', compact('sistemas'));
    }

    public function show($id)
    {
        $sistema = Sistema::findOrFail($id);
        return view('sistemas.show', compact('sistema'));
    }

    public function create()
    {
        return view('sistemas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'baseDatos' => 'required|boolean',
            'configuracion' => 'required|string',
            'red' => 'required|boolean',
            'servidor' => 'required|boolean',
        ]);

        Sistema::create($request->all());
        return redirect()->route('sistemas.index');
    }

    public function edit($id)
    {
        $sistema = Sistema::findOrFail($id);
        return view('sistemas.edit', compact('sistema'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'baseDatos' => 'required|boolean',
            'configuracion' => 'required|string',
            'red' => 'required|boolean',
            'servidor' => 'required|boolean',
        ]);

        $sistema = Sistema::findOrFail($id);
        $sistema->update($request->all());
        return redirect()->route('sistemas.index');
    }

    public function destroy($id)
    {
        $sistema = Sistema::findOrFail($id);
        $sistema->delete();
        return redirect()->route('sistemas.index');
    }
}
