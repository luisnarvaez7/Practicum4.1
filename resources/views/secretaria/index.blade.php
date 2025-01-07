@extends('layouts.master')

@section('title', 'Listado de Secretarias')

@section('content')
  <h2>Listado de Secretarias</h2>
  <a href="{{ route('secretarias.create') }}" class="btn btn-primary mb-3">Agregar Secretaria</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($secretarias as $secretaria)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $secretaria->name }}</td>
          <td>{{ $secretaria->lastname }}</td>
          <td>{{ $secretaria->email }}</td>
          <td>
            <a href="{{ route('secretarias.show', $secretaria->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('secretarias.edit', $secretaria->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('secretarias.destroy', $secretaria->id) }}" method="POST" style="display:inline-block;">
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
