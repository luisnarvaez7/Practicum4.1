@extends('layouts.master')

@section('title', 'Detalle de Sistema')

@section('content')
  <h2>Detalle de Sistema</h2>
  <p><strong>Base de Datos:</strong> {{ $sistema->baseDatos ? 'Sí' : 'No' }}</p>
  <p><strong>Configuración:</strong> {{ $sistema->configuracion }}</p>
  <p><strong>Red:</strong> {{ $sistema->red ? 'Sí' : 'No' }}</p>
  <p><strong>Servidor:</strong> {{ $sistema->servidor ? 'Sí' : 'No' }}</p>
  
  <a href="{{ route('sistemas.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
