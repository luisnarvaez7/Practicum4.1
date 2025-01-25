<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmacyServiceController extends Controller
{
    public function index()
    {
        // Lógica para mostrar los servicios de farmacia
        return view('services.pharmacy');
    }
}
