<?php

namespace App\BusinessLogic\Services;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorService
{
    public function getAllDoctors(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->paginate($perPage);
    }

    public function getDoctorById($id)
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->findOrFail($id);
    }

    public function createDoctor(Request $request)
    {
        $data = $request->all();
        $doctor = User::create($data);
        $doctor->assignRole('doctor');
        return $doctor;
    }

    public function updateDoctor($id, Request $request)
    {
        $doctor = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->findOrFail($id);
        $doctor->update($request->all());
        return $doctor;
    }

    public function deleteDoctor($id)
    {
        $doctor = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->findOrFail($id);
        $doctor->delete();
        return $doctor;
    }

    public function getDoctorsBySpecialization($specializationId)
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->whereHas('specializations', function ($query) use ($specializationId) {
            $query->where('id', $specializationId);
        })->get();
    }
}
