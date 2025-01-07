@extends('layouts.master')

@section('title', 'Crear Paciente')

@section('content')
  <h2>Crear Paciente</h2>
  <form action="{{ route('patients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Apellido</label>
      <input type="text" name="lastname" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Correo Electrónico</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección</label>
      <input type="text" name="direccion" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="edad" class="form-label">Edad</label>
      <input type="number" name="edad" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
      <input type="date" name="fechaNacimiento" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="genero" class="form-label">Género</label>
      <input type="text" name="genero" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="historialMedico" class="form-label">Historial Médico</label>
      <textarea name="historialMedico" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
@endsection
