<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmergencyServiceController extends Controller
{
    public function index()
    {
        // Lógica para mostrar los servicios de emergencia
        return view('services.emergency');
    }
}
