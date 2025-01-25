@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Disponibilidad</h1>
    <form action="{{ route('admin.availability.update', $availability->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" disabled>
                <option value="{{ $availability->doctor->id }}">{{ $availability->doctor->name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="day_of_week">Día de la Semana</label>
            <select name="day_of_week" id="day_of_week" class="form-control">
                <option value="monday" {{ $availability->day_of_week == 'monday' ? 'selected' : '' }}>Lunes</option>
                <option value="tuesday" {{ $availability->day_of_week == 'tuesday' ? 'selected' : '' }}>Martes</option>
                <option value="wednesday" {{ $availability->day_of_week == 'wednesday' ? 'selected' : '' }}>Miércoles</option>
                <option value="thursday" {{ $availability->day_of_week == 'thursday' ? 'selected' : '' }}>Jueves</option>
                <option value="friday" {{ $availability->day_of_week == 'friday' ? 'selected' : '' }}>Viernes</option>
                <option value="saturday" {{ $availability->day_of_week == 'saturday' ? 'selected' : '' }}>Sábado</option>
                <option value="sunday" {{ $availability->day_of_week == 'sunday' ? 'selected' : '' }}>Domingo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Hora de Inicio</label>
            <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $availability->start_time }}">
        </div>
        <div class="form-group">
            <label for="end_time">Hora de Fin</label>
            <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $availability->end_time }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
