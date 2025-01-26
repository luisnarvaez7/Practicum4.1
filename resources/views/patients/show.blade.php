@extends('layouts.master')

@section('title', 'Detalles del Paciente')

@section('content')
  <h2>Detalles del Paciente</h2>

  <div class="mb-3">
    <label class="form-label"><strong>Nombre:</strong></label>
    <p>{{ $patient->name }}</p>
  </div>

  <div class="mb-3">
    <label class="form-label"><strong>Apellido:</strong></label>
    <p>{{ $patient->lastname }}</p>
  </div>

  <div class="mb-3">
    <label class="form-label"><strong>Correo Electrónico:</strong></label>
    <p>{{ $patient->email }}</p>
  </div>

  <div class="mb-3">
    <label class="form-label"><strong>Dirección:</strong></label>
    <p>{{ $patient->direccion }}</p>
  </div>

  <div class="mb-3">
    <label class="form-label"><strong>Edad:</strong></label>
    <p>{{ $patient->edad }}</p>
  </div>

  <div class="mb-3">
    <label class="form-label"><strong>Género:</strong></label>
    <p>{{ $patient->genero }}</p>
  </div>

  <a href="{{ route('patients.index') }}" class="btn btn-secondary">Volver</a>
@endsection
