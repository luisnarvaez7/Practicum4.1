<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Availability;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Listar todas las citas (solo para administradores o médicos)
    public function index()
    {
         $user = Auth::user();
        if ($user->hasRole('Admin')) {
            $appointments = Appointment::with(['doctor', 'patient'])->paginate(10);
        } elseif ($user->hasRole('Doctor')) {
            $appointments = Appointment::where('doctor_id', $user->id)->with(['doctor', 'patient'])->paginate(10);
        } else {
            abort(403, 'Unauthorized action.');
        }

        $doctors = User::role('Doctor')->get(); // Obtener todos los doctores
        return view('appointments.index', compact('appointments', 'doctors'));
    }

    // Crear una nueva cita
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string',
        ]);

        $appointment = new Appointment();
        $appointment->doctor_id = $validated['doctor_id'];
        $appointment->patient_id = Auth::id();
        $appointment->appointment_date = $validated['appointment_date'];
        $appointment->start_time = $validated['start_time'];
        $appointment->end_time = $validated['end_time'];
        $appointment->notes = $validated['notes'] ?? '';
        $appointment->status = 'Scheduled';
        $appointment->save();

        return response()->json(['message' => 'Cita creada con éxito', 'appointment' => $appointment], 201);
    }

    // Mostrar una cita específica
    public function show($id)
    {
        $appointment = Appointment::with(['doctor', 'patient'])->findOrFail($id);
        return response()->json($appointment);
    }

    // Actualizar una cita
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string',
            'status' => 'required|string|in:Scheduled,Completed,Canceled',
        ]);

        $appointment->update($validated);

        return response()->json(['message' => 'Cita actualizada con éxito', 'appointment' => $appointment], 200);
    }

    // Eliminar una cita
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json(['message' => 'Cita eliminada con éxito'], 200);
    }
}
