@extends('layouts.master')

@section('title', 'Agregar Secretaria')

@section('content')
  <h2>Agregar Secretaria</h2>
  <form action="{{ route('secretarias.store') }}" method="POST">
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
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
@endsection
