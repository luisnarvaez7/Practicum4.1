<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSpecialization;

class DoctorSpecializationController extends Controller
{
    // ...existing code...

    public function index()
    {
        $specializations = DoctorSpecialization::all();
        return view('doctor_specializations.index', compact('specializations'));
    }

    public function show($id)
    {
        $specialization = DoctorSpecialization::find($id);
        if ($specialization) {
            return response()->json($specialization);
        } else {
            return response()->json(['message' => 'Specialization not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $specialization = DoctorSpecialization::create($request->all());
        return response()->json($specialization, 201);
    }

    public function update(Request $request, $id)
    {
        $specialization = DoctorSpecialization::find($id);
        if ($specialization) {
            $specialization->update($request->all());
            return response()->json($specialization);
        } else {
            return response()->json(['message' => 'Specialization not found'], 404);
        }
    }

    public function destroy($id)
    {
        $specialization = DoctorSpecialization::find($id);
        if ($specialization) {
            $specialization->delete();
            return response()->json(['message' => 'Specialization deleted']);
        } else {
            return response()->json(['message' => 'Specialization not found'], 404);
        }
    }
}
