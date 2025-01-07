@extends('layouts.master')

@section('title', 'Listado de Pacientes')

@section('content')
  <h2>Listado de Pacientes</h2>
  <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Crear Paciente</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Dirección</th>
        <th>Edad</th>
        <th>Género</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($patients as $patient)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $patient->name }}</td>
          <td>{{ $patient->lastname }}</td>
          <td>{{ $patient->email }}</td>
          <td>{{ $patient->direccion }}</td>
          <td>{{ $patient->edad }}</td>
          <td>{{ $patient->genero }}</td>
          <td>
            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
