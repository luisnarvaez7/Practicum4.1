@extends('layouts.master')

@section('title', 'Listado de Notificaciones')

@section('content')
  <h2>Listado de Notificaciones</h2>
  <a href="{{ route('notificaciones.create') }}" class="btn btn-success">Crear Nueva Notificación</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Mensaje</th>
        <th>Tipo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($notificaciones as $notificacion)
        <tr>
          <td>{{ $notificacion->id }}</td>
          <td>{{ $notificacion->estado }}</td>
          <td>{{ $notificacion->fecha }}</td>
          <td>{{ $notificacion->mensaje }}</td>
          <td>{{ $notificacion->tipo }}</td>
          <td>
            <a href="{{ route('notificaciones.show', $notificacion->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('notificaciones.edit', $notificacion->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('notificaciones.destroy', $notificacion->id) }}" method="POST" style="display:inline-block;">
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
