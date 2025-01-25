<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Sección de bienvenida -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>

            <!-- Sección de estadísticas -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6 p-6">
                <h3 class="text-lg font-semibold mb-4">Estadísticas de Citas Médicas</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Citas totales -->
                    <div class="p-4 bg-blue-100 rounded-lg shadow">
                        <h4 class="text-lg font-bold">Total de Citas</h4>
                        <p class="text-3xl font-extrabold text-blue-600">{{ $stats['totalAppointments'] }}</p>
                    </div>

                    <!-- Citas pendientes -->
                    <div class="p-4 bg-yellow-100 rounded-lg shadow">
                        <h4 class="text-lg font-bold">Citas Pendientes</h4>
                        <p class="text-3xl font-extrabold text-yellow-600">{{ $stats['pendingAppointments'] }}</p>
                    </div>

                    <!-- Citas completadas -->
                    <div class="p-4 bg-green-100 rounded-lg shadow">
                        <h4 class="text-lg font-bold">Citas Completadas</h4>
                        <p class="text-3xl font-extrabold text-green-600">{{ $stats['completedAppointments'] }}</p>
                    </div>

                    <!-- Total de doctores -->
                    <div class="p-4 bg-purple-100 rounded-lg shadow">
                        <h4 class="text-lg font-bold">Doctores Registrados</h4>
                        <p class="text-3xl font-extrabold text-purple-600">{{ $stats['totalDoctors'] }}</p>
                    </div>

                    <!-- Total de pacientes -->
                    <div class="p-4 bg-pink-100 rounded-lg shadow">
                        <h4 class="text-lg font-bold">Pacientes Registrados</h4>
                        <p class="text-3xl font-extrabold text-pink-600">{{ $stats['totalPatients'] }}</p>
                    </div>

                    <!-- Especialización más solicitada -->
                    <div class="p-4 bg-gray-100 rounded-lg shadow">
                        <h4 class="text-lg font-bold">Especialización Más Solicitada</h4>
                        <p class="text-xl font-semibold text-gray-700">{{ $stats['mostRequestedSpecialization'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
