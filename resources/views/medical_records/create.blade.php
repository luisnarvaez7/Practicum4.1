<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Registro Médico') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ __('Crear Registro Médico') }}</h1>
        <p class="mb-6">{{ __('Llene el formulario a continuación para crear un nuevo registro médico.') }}</p>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('medical_records.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="patient_name" class="block text-sm font-medium text-gray-700">{{ __('Nombre del Paciente') }}</label>
                        <input type="text" name="patient_name" id="patient_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">{{ __('Fecha') }}</label>
                        <input type="date" name="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                </div>
                <div class="mt-6">
                    <x-button>{{ __('Guardar') }}</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
