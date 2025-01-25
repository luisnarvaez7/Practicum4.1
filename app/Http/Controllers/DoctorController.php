<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\BusinessLogic\Services\DoctorService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Specialization;

class DoctorController extends Controller
{
    protected $doctorService;

    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }

    public function index(Request $request)
    {
        $specializations = Specialization::all();

        if ($request->has('specialization_id')) {
            $doctors = $this->doctorService->getDoctorsBySpecialization($request->specialization_id);
            return response()->json($doctors);
        }

        $doctors = $this->doctorService->getAllDoctors($request);
        return view('doctors.index', compact('doctors', 'specializations'));
    }

    public function show($id)
    {
        return response()->json($this->doctorService->getDoctorById($id));
    }

    public function store(Request $request)
    {
        $doctor = $this->doctorService->createDoctor($request);
        return response()->json($doctor, 201);
    }

    public function update(Request $request, $id)
    {
        $doctor = $this->doctorService->updateDoctor($id, $request);
        return response()->json($doctor);
    }

    public function destroy($id)
    {
        $this->doctorService->deleteDoctor($id);
        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('query');
            $doctors = User::where('name', 'LIKE', "%{$query}%")->paginate(5);
            return response()->json($doctors);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al buscar doctores', 'error' => $e->getMessage()], 500);
        }
    }
}
