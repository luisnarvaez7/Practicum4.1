@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Disponibilidad</h1>
    <form action="{{ route('admin.availability.store') }}" method="POST">
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
            <label for="day_of_week">Día de la Semana</label>
            <select name="day_of_week" id="day_of_week" class="form-control">
                <option value="monday">Lunes</option>
                <option value="tuesday">Martes</option>
                <option value="wednesday">Miércoles</option>
                <option value="thursday">Jueves</option>
                <option value="friday">Viernes</option>
                <option value="saturday">Sábado</option>
                <option value="sunday">Domingo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Hora de Inicio</label>
            <input type="time" name="start_time" id="start_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_time">Hora de Fin</label>
            <input type="time" name="end_time" id="end_time" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
