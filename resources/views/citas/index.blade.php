@extends('layouts.master')

@section('title', 'Listado de Citas')

@section('content')
  <h2>Listado de Citas</h2>
  <a href="{{ route('citas.create') }}" class="btn btn-primary mb-3">Agregar Cita</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Paciente</th>
        <th>Doctor</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estado</th>
        <th>Motivo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($citas as $cita)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $cita->paciente->name }}</td>
          <td>{{ $cita->doctor->name }}</td>
          <td>{{ $cita->fecha }}</td>
          <td>{{ $cita->hora }}</td>
          <td>{{ $cita->estado ? 'Activa' : 'Cancelada' }}</td>
          <td>{{ $cita->motivo }}</td>
          <td>
            <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display:inline-block;">
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
