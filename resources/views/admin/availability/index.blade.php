<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Doctors') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Disponibilidad de Doctores</h1>
        <a href="{{ route('admin.availability.create') }}" class="btn btn-primary mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Disponibilidad</a>
        <table class="table-auto w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">doctor</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Hora de Inicio</th>
                    <th class="px-4 py-2">Hora de Fin</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($availabilities as $availability)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $availability->doctor->name }}</td>
                    <td class="px-4 py-2">{{ $availability->date }}</td>
                    <td class="px-4 py-2">{{ $availability->start_time }}</td>
                    <td class="px-4 py-2">{{ $availability->end_time }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.availability.edit', $availability->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                        <form action="{{ route('admin.availability.destroy', $availability->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $availabilities->links() }}
        </div>
    </div>
</x-app-layout>
