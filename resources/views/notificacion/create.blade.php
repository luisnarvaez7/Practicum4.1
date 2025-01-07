@extends('layouts.master')

@section('title', 'Detalle de Notificación')

@section('content')
  <h2>Detalle de Notificación</h2>
  <p><strong>Estado:</strong> {{ $notificacion->estado }}</p>
  <p><strong>Fecha:</strong> {{ $notificacion->fecha }}</p>
  <p><strong>Mensaje:</strong> {{ $notificacion->mensaje }}</p>
  <p><strong>Tipo:</strong> {{ $notificacion->tipo }}</p>
  
  <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
