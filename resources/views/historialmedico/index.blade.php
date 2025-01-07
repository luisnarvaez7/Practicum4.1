@extends('layouts.master')

@section('title', 'Listado de Historiales Médicos')

@section('content')
  <h2>Listado de Historiales Médicos</h2>
  <a href="{{ route('historialmedico.create') }}" class="btn btn-success">Crear Nuevo Historial</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Diagnóstico</th>
        <th>Fecha de Actualización</th>
        <th>Tratamiento</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($historiales as $historial)
        <tr>
          <td>{{ $historial->id }}</td>
          <td>{{ $historial->diagnostico }}</td>
          <td>{{ $historial->Fechadeactualizacion }}</td>
          <td>{{ $historial->tratamiento }}</td>
          <td>
            <a href="{{ route('historialmedico.show', $historial->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('historialmedico.edit', $historial->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('historialmedico.destroy', $historial->id) }}" method="POST" style="display:inline-block;">
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
