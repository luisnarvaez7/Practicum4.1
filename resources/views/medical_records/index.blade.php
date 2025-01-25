<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros Médicos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registros Médicos</h1>
        <!-- Aquí puedes agregar la lógica para mostrar los registros médicos -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Paciente</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Suponiendo que tienes una variable $records que contiene los registros médicos -->
                @foreach($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->patient_name }}</td>
                        <td>{{ $record->date }}</td>
                        <td>
                            <a href="{{ route('medical_records.edit', $record->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('medical_records.destroy', $record->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
