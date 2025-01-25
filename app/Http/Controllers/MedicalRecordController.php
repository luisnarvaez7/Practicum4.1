<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\User;

class MedicalRecordController extends Controller
{
    public function index()
    {
        // Lógica para mostrar los registros médicos
        $records = User::all();
        return view('medical_records.index', compact('records'));
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de un registro médico
        return view('medical_records.create');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo registro médico
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de un registro médico
        return view('medical_records.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un registro médico existente
    }

    public function destroy($id)
    {
        // Lógica para eliminar un registro médico
    }
}
