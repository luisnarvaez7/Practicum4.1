@extends('layouts.master')

@section('title', 'Detalle de Estadística')

@section('content')
  <h2>Detalle de Estadística</h2>
  <p><strong>Datos:</strong> {{ $estadistica->datos ? 'Sí' : 'No' }}</p>
  <p><strong>Fecha:</strong> {{ $estadistica->fecha }}</p>
  <p><strong>Tipo:</strong> {{ $estadistica->tipo }}</p>

  <h3>Historial Médico Asociado</h3>
  <ul>
    @foreach($historiales as $historial)
      <li>Diagnóstico: {{ $historial->diagnostico }} - Fecha de Actualización: {{ $historial->fechadeactualizacion }}</li>
    @endforeach
  </ul>
  
  <a href="{{ route('estadisticas.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
