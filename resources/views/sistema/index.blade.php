@extends('layouts.master')

@section('title', 'Listado de Sistemas')

@section('content')
  <h2>Listado de Sistemas</h2>
  <a href="{{ route('sistemas.create') }}" class="btn btn-success">Crear Nuevo Sistema</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Base de Datos</th>
        <th>Configuración</th>
        <th>Red</th>
        <th>Servidor</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sistemas as $sistema)
        <tr>
          <td>{{ $sistema->id }}</td>
          <td>{{ $sistema->baseDatos ? 'Sí' : 'No' }}</td>
          <td>{{ $sistema->configuracion }}</td>
          <td>{{ $sistema->red ? 'Sí' : 'No' }}</td>
          <td>{{ $sistema->servidor ? 'Sí' : 'No' }}</td>
          <td>
            <a href="{{ route('sistemas.show', $sistema->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('sistemas.edit', $sistema->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('sistemas.destroy', $sistema->id) }}" method="POST" style="display:inline-block;">
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
