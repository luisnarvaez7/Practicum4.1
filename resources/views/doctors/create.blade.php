@extends('layouts.master')

@section('title', 'Agregar Doctor')

@section('content')
  <h2>Agregar Doctor</h2>
  <form action="{{ route('doctors.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Apellido</label>
      <input type="text" class="form-control" id="lastname" name="lastname" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Correo Electrónico</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="especialidad" class="form-label">Especialidad</label>
      <input type="text" class="form-control" id="especialidad" name="especialidad" required>
    </div>
    <div class="mb-3">
      <label for="horario" class="form-label">Horario</label>
      <input type="number" class="form-control" id="horario" name="horario" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
@endsection
