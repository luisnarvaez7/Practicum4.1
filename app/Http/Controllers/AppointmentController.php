<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Specialization;
use App\BusinessLogic\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index(Request $request)
    {
        $appointments = $this->appointmentService->getAllAppointments($request);
        $specializations = Specialization::all();
        return view('appointments.index', compact('appointments', 'specializations'));
    }

    public function show($id)
    {
        $appointment = $this->appointmentService->getAppointmentById($id);
        return view('appointments.show', compact('appointment'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $this->appointmentService->createAppointment($request);
        return redirect()->route('appointments.index');
    }

    public function edit($id)
    {
        $appointment = $this->appointmentService->getAppointmentById($id);
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $this->appointmentService->updateAppointment($id, $request);
        return redirect()->route('appointments.index');
    }

    public function destroy($id)
    {
        $this->appointmentService->deleteAppointment($id);
        return redirect()->route('appointments.index');
    }
}
