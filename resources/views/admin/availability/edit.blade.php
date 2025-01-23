<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Doctors') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Editar Disponibilidad</h1>
        <form action="{{ route('admin.availability.update', $availability->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="doctor_id" class="block text-gray-700 font-bold mb-2">Doctor</label>
                <select name="doctor_id" id="doctor_id" class="form-control w-full border border-gray-300 rounded-lg p-2">
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $doctor->id == $availability->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="day_of_week" class="block text-gray-700 font-bold mb-2">Día de la Semana</label>
                <select name="day_of_week" id="day_of_week" class="form-control w-full border border-gray-300 rounded-lg p-2">
                    <option value="monday" {{ $availability->day_of_week == 'monday' ? 'selected' : '' }}>Lunes</option>
                    <option value="tuesday" {{ $availability->day_of_week == 'tuesday' ? 'selected' : '' }}>Martes</option>
                    <option value="wednesday" {{ $availability->day_of_week == 'wednesday' ? 'selected' : '' }}>Miércoles</option>
                    <option value="thursday" {{ $availability->day_of_week == 'thursday' ? 'selected' : '' }}>Jueves</option>
                    <option value="friday" {{ $availability->day_of_week == 'friday' ? 'selected' : '' }}>Viernes</option>
                    <option value="saturday" {{ $availability->day_of_week == 'saturday' ? 'selected' : '' }}>Sábado</option>
                    <option value="sunday" {{ $availability->day_of_week == 'sunday' ? 'selected' : '' }}>Domingo</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="start_time" class="block text-gray-700 font-bold mb-2">Hora de Inicio</label>
                <input type="time" name="start_time" id="start_time" class="form-control w-full border border-gray-300 rounded-lg p-2" value="{{ $availability->start_time }}">
            </div>
            <div class="form-group mb-4">
                <label for="end_time" class="block text-gray-700 font-bold mb-2">Hora de Fin</label>
                <input type="time" name="end_time" id="end_time" class="form-control w-full border border-gray-300 rounded-lg p-2" value="{{ $availability->end_time }}">
            </div>
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
        </form>
    </div>
</x-app-layout>
