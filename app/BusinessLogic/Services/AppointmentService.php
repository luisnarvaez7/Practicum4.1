<?php

namespace App\BusinessLogic\Services;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentService
{
    public function getAllAppointments(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        return Appointment::paginate($perPage);
    }

    public function getAppointmentById($id)
    {
        return Appointment::findOrFail($id);
    }

    public function createAppointment(Request $request)
    {
        return Appointment::create($request->all());
    }

    public function updateAppointment($id, Request $request)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        return $appointment;
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
    }
}
