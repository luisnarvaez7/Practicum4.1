<?php

namespace App\Http\Controllers;

use App\BusinessLogic\Services\PatientService;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'email']);
        $patients = $this->patientService->getAllPatients($request);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $this->patientService->createPatient($request);
        return redirect()->route('admin.patients.index');
    }

    public function edit(User $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, User $patient)
    {
        $this->patientService->updatePatient($patient->id, $request);
        return redirect()->route('admin.patients.index');
    }

    public function destroy(User $patient)
    {
        $this->patientService->deletePatient($patient->id);
        return redirect()->route('admin.patients.index');
    }
}
