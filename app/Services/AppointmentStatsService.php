<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentStatsService
{
    public function getStats()
    {
        $totalAppointments = Appointment::count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();

        return [
            'total' => $totalAppointments,
            'completed' => $completedAppointments,
            'pending' => $pendingAppointments,
        ];
    }
}
