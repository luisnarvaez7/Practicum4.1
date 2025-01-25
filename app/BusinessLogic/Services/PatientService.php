<?php

namespace App\BusinessLogic\Services;

use App\Models\User;
use Illuminate\Http\Request;

class PatientService
{
    public function getAllPatients(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->paginate($perPage);
    }

    public function getPatientById($id)
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->findOrFail($id);
    }

    public function createPatient(Request $request)
    {
        $data = $request->all();
        $patient = User::create($data);
        $patient->assignRole('patient');
        return $patient;
    }

    public function updatePatient($id, Request $request)
    {
        $patient = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->findOrFail($id);
        $patient->update($request->all());
        return $patient;
    }

    public function deletePatient($id)
    {
        $patient = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->findOrFail($id);
        $patient->delete();
    }
}
