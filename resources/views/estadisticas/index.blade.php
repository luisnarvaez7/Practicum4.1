@extends('layouts.master')

@section('title', 'Listado de Estadísticas')

@section('content')
  <h2>Listado de Estadísticas</h2>
  <a href="{{ route('estadisticas.create') }}" class="btn btn-success">Crear Nueva Estadística</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Datos</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($estadisticas as $estadistica)
        <tr>
          <td>{{ $estadistica->id }}</td>
          <td>{{ $estadistica->datos ? 'Sí' : 'No' }}</td>
          <td>{{ $estadistica->fecha }}</td>
          <td>{{ $estadistica->tipo }}</td>
          <td>
            <a href="{{ route('estadisticas.show', $estadistica->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('estadisticas.edit', $estadistica->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('estadisticas.destroy', $estadistica->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
