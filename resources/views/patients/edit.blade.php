@extends('layouts.master')

@section('title', 'Editar Paciente')

@section('content')
  <h2>Editar Paciente</h2>

  <form action="{{ route('patients.update', $patient->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" name="name" class="form-control" value="{{ $patient->name }}" required>
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Apellido</label>
      <input type="text" name="lastname" class="form-control" value="{{ $patient->lastname }}" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Correo Electrónico</label>
      <input type="email" name="email" class="form-control" value="{{ $patient->email }}" required>
    </div>
    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección</label>
      <input type="text" name="direccion" class="form-control" value="{{ $patient->direccion }}" required>
    </div>
    <div class="mb-3">
      <label for="edad" class="form-label">Edad</label>
      <input type="number" name="edad" class="form-control" value="{{ $patient->edad }}" required>
    </div>
    <div class="mb-3">
      <label for="genero" class="form-label">Género</label>
      <input type="text" name="genero" class="form-control" value="{{ $patient->genero }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection

