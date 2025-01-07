@extends('layouts.master')

@section('title', 'Listado de Doctores')

@section('content')
  <h2>Listado de Doctores</h2>
  <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Agregar Doctor</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Especialidad</th>
        <th>Horario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($doctors as $doctor)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $doctor->name }}</td>
          <td>{{ $doctor->lastname }}</td>
          <td>{{ $doctor->email }}</td>
          <td>{{ $doctor->especialidad }}</td>
          <td>{{ $doctor->horario }}</td>
          <td>
            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
