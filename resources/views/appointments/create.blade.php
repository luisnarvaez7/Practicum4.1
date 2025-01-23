@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Cita Médica</h1>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_date">Fecha de la Cita</label>
            <input type="date" name="appointment_date" id="appointment_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_time">Hora de Inicio</label>
            <input type="time" name="start_time" id="start_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_time">Hora de Fin</label>
            <input type="time" name="end_time" id="end_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="notes">Notas</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Cita</button>
    </form>
</div>
@endsection
