<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Specialization;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalAppointments' => Appointment::count(),
            'pendingAppointments' => Appointment::where('status', 'pending')->count(),
            'completedAppointments' => Appointment::where('status', 'completed')->count(),
            'totalDoctors' => User::role('doctor')->count(),
            'totalPatients' => User::role('patient')->count(),
            'mostRequestedSpecialization' => Specialization::withCount('doctors')
                ->orderBy('doctors_count', 'desc')
                ->first()->name ?? 'N/A',
        ];

        return view('dashboard', compact('stats'));
    }
}
