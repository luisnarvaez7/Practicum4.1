<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboratoryServiceController extends Controller
{
    public function index()
    {
        // Lógica para mostrar los servicios de laboratorio
        return view('services.laboratory');
    }
}
