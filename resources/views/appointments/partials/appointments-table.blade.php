<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Doctor</th>
                <th class="py-2 px-4 border-b">Patient</th>
                <th class="py-2 px-4 border-b">Date</th>
                <th class="py-2 px-4 border-b">Start Time</th>
                <th class="py-2 px-4 border-b">End Time</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $appointment->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->doctor->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->patient->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->appointment_date }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->start_time }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->end_time }}</td>
                    <td class="py-2 px-4 border-b">{{ $appointment->status }}</td>
                    <td class="py-2 px-4 border-b">
                        <button @click="openModal(true, {{ $appointment->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</button>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
