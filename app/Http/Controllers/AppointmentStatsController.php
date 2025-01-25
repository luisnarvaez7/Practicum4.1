<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AppointmentStatsService;

class AppointmentStatsController extends Controller
{
    protected $appointmentStatsService;

    public function __construct(AppointmentStatsService $appointmentStatsService)
    {
        $this->appointmentStatsService = $appointmentStatsService;
    }

    public function index()
    {
        $stats = $this->appointmentStatsService->getStats();
        return response()->json($stats);
    }
}
