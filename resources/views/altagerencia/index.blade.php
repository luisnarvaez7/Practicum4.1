@extends('layouts.master')

@section('title', 'Panel de Alta Gerencia')

@section('content')
  <h2>Panel de Alta Gerencia</h2>
  <a href="{{ route('altagerencia.consultarEstadisticas') }}" class="btn btn-info">Consultar Estadísticas</a>
  <a href="{{ route('altagerencia.exportarReporte') }}" class="btn btn-success">Exportar Reporte</a>
  <a href="{{ route('altagerencia.generarReporte') }}" class="btn btn-warning">Generar Reporte</a>
@endsection
