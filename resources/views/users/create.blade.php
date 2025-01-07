@extends('layouts.master')

@section('title', 'Crear Usuario')

@section('content')
  <h2>Crear Usuario</h2>
  <form action="{{ route('users.store') }}" method="POST">
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
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Rol</label>
      <input type="text" name="role" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
@endsection
