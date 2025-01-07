<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use App\Models\Cita;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function index()
    {
        $notificaciones = Notificacion::all();
        return view('notificaciones.index', compact('notificaciones'));
    }

    public function show($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        return view('notificaciones.show', compact('notificacion'));
    }

    public function create()
    {
        $citas = Cita::all();
        return view('notificaciones.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required|string',
            'fecha' => 'required|int',
            'mensaje' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'usuario_id' => 'required|int',
            'cita_id' => 'required|int',
        ]);

        Notificacion::create($request->all());
        return redirect()->route('notificaciones.index');
    }

    public function edit($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $citas = Cita::all();
        return view('notificaciones.edit', compact('notificacion', 'citas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string',
            'fecha' => 'required|int',
            'mensaje' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'usuario_id' => 'required|int',
            'cita_id' => 'required|int',
        ]);

        $notificacion = Notificacion::findOrFail($id);
        $notificacion->update($request->all());
        return redirect()->route('notificaciones.index');
    }

    public function destroy($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->delete();
        return redirect()->route('notificaciones.index');
    }
}
