@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Cita Médica</h1>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">doctor</label>
            <input type="text" id="doctor_search" name="doctor_search" class="form-control" placeholder="Search doctors" @input="filterDoctors">
            <ul x-show="filteredDoctors.length > 0" class="bg-white border rounded mt-1 max-h-40 overflow-y-auto">
                <template x-for="doctor in filteredDoctors" :key="doctor.id">
                    <li @click="selectDoctor(doctor)" class="px-4 py-2 cursor-pointer hover:bg-gray-200" x-text="doctor.name"></li>
                </template>
            </ul>
            <input type="hidden" id="doctor_id" name="doctor_id">
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
<script>
    function appointmentData() {
        return {
            doctorSearch: '',
            filteredDoctors: [],
            filterDoctors() {
                fetch(`/doctors/search?query=${this.doctorSearch}`)
                    .then(response => response.json())
                    .then(data => {
                        this.filteredDoctors = data;
                    });
            },
            selectDoctor(doctor) {
                document.getElementById('doctor_id').value = doctor.id;
                document.getElementById('doctor_search').value = doctor.name;
                this.filteredDoctors = [];
            }
        };
    }
</script>
@endsection
