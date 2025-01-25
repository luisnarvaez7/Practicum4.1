<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Appointments') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12" x-data="appointmentData()" @keydown.escape.window="closeModal()">
        <h1 class="text-2xl font-bold mb-6">Manage Appointments</h1>

        <!-- Botón para abrir el modal -->
        <button @click="openModal(false)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">Create New Appointment</button>

        <!-- Tabla de citas -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">doctor</th>
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

        <!-- Paginación -->
        <div class="mt-4">
            {{ $appointments->links() }}
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75" style="display: none;">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-lg" @click.away="closeModal()">
                <h2 class="text-xl font-semibold mb-4" x-text="isEdit ? 'Edit Appointment' : 'Create New Appointment'"></h2>
                <form @submit.prevent="saveAppointment">
                    <div class="mb-4">
                        <label for="specialization_id" class="block text-gray-700">Specialization</label>
                        <select id="specialization_id" x-model="form.specialization_id" @change="fetchDoctors" class="w-full border-gray-300 rounded mt-1" required>
                            <option value="">{{ __('Select Specialization') }}</option>
                            @foreach($specializations as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                            @endforeach
                        </select>
                        <p x-text="errors.specialization_id" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="doctor_id" class="block text-gray-700">doctor</label>
                        <input type="text" id="doctor_search" x-model="doctorSearch" @input.debounce.500ms="filterDoctors" placeholder="Search doctors" class="w-full border-gray-300 rounded mt-1" :disabled="!form.specialization_id" @focus="showDropdown = true" @blur="hideDropdown">
                        <div class="relative">
                            <ul x-show="filteredDoctors.length > 0" class="absolute z-10 bg-white border border-gray-300 mt-1 w-full max-h-40 overflow-y-auto">
                                <template x-for="doctor in filteredDoctors" :key="doctor.id">
                                    <li @click="selectDoctor(doctor)" class="cursor-pointer px-4 py-2 hover:bg-gray-200" x-text="doctor.name"></li>
                                </template>
                            </ul>
                        </div>
                        <input type="hidden" id="doctor_id" x-model="form.doctor_id">
                        <p x-text="errors.doctor_id" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="appointment_date" class="block text-gray-700">Date</label>
                        <input type="date" id="appointment_date" x-model="form.appointment_date" class="w-full border-gray-300 rounded mt-1" required>
                        <p x-text="errors.appointment_date" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="start_time" class="block text-gray-700">Start Time</label>
                        <input type="time" id="start_time" x-model="form.start_time" class="w-full border-gray-300 rounded mt-1" required>
                        <p x-text="errors.start_time" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-gray-700">End Time</label>
                        <input type="time" id="end_time" x-model="form.end_time" class="w-full border-gray-300 rounded mt-1" required>
                        <p x-text="errors.end_time" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="availability" class="block text-gray-700">Availability</label>
                        <select id="availability" x-model="form.availability_id" class="w-full border-gray-300 rounded mt-1" required>
                            <option value="">{{ __('Select Availability') }}</option>
                            <template x-for="availability in availabilities" :key="availability.id">
                                <option :value="availability.id" x-text="`${availability.day_of_week} ${availability.start_time} - ${availability.end_time}`"></option>
                            </template>
                        </select>
                        <p x-text="errors.availability_id" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="block text-gray-700">Notes</label>
                        <textarea id="notes" x-model="form.notes" class="w-full border-gray-300 rounded mt-1"></textarea>
                        <p x-text="errors.notes" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" @click="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function appointmentData() {
            return {
                showModal: false,
                isEdit: false,
                showDropdown: false,
                form: {
                    id: null,
                    specialization_id: '',
                    doctor_id: '',
                    availability_id: '',
                    appointment_date: '',
                    start_time: '',
                    end_time: '',
                    notes: '',
                },
                errors: {},
                doctorSearch: '',
                filteredDoctors: [],
                availabilities: [],
                openModal(edit = false, appointmentId = null) {
                    this.isEdit = edit;
                    if (edit) {
                        fetch(`/appointments/${appointmentId}`)
                            .then(response => response.json())
                            .then(data => {
                                this.form = {
                                    id: data.id,
                                    specialization_id: data.specialization_id,
                                    doctor_id: data.doctor_id,
                                    availability_id: data.availability_id,
                                    appointment_date: data.appointment_date,
                                    start_time: data.start_time,
                                    end_time: data.end_time,
                                    notes: data.notes,
                                };
                            });
                    } else {
                        this.form = {
                            id: null,
                            specialization_id: '',
                            doctor_id: '',
                            availability_id: '',
                            appointment_date: '',
                            start_time: '',
                            end_time: '',
                            notes: '',
                        };
                    }
                    this.errors = {};
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                    this.showDropdown = false;
                    this.form = { id: null, specialization_id: '', doctor_id: '', availability_id: '', appointment_date: '', start_time: '', end_time: '', notes: '' };
                    this.errors = {};
                },
                saveAppointment() {
                    const url = this.isEdit ? `/appointments/${this.form.id}` : '/appointments';
                    const method = this.isEdit ? 'PUT' : 'POST';
                    fetch(url, {
                        method: method,
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: JSON.stringify(this.form),
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(data => { throw data; });
                            }
                            console.log('Appointment saved successfully:', this.form);
                            this.closeModal();
                            location.reload(); // Recarga para reflejar cambios
                        })
                        .catch(error => {
                            console.error('Error saving appointment:', error);
                            this.errors = error.errors || {};
                        });
                },
                fetchDoctors() {
                    fetch(`/doctors?specialization_id=${this.form.specialization_id}`)
                        .then(response => response.json())
                        .then(data => {
                            this.filteredDoctors = data;
                        });
                },
                filterDoctors() {
                    if (this.doctorSearch.length > 2) {
                        let url = `/doctors/search?query=${this.doctorSearch}`;
                        if (this.form.specialization_id) {
                            url += `&specialization_id=${this.form.specialization_id}`;
                        }
                        fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                this.filteredDoctors = data;
                            });
                    } else {
                        this.filteredDoctors = [];
                    }
                },
                selectDoctor(doctor) {
                    this.form.doctor_id = doctor.id;
                    this.doctorSearch = doctor.name;
                    this.filteredDoctors = [];
                    this.fetchAvailabilities();
                },
                fetchAvailabilities() {
                    fetch(`/admin/availability/${this.form.doctor_id}`)
                        .then(response => response.json())
                        .then(data => {
                            this.availabilities = data;
                        });
                },
                hideDropdown() {
                    setTimeout(() => {
                        this.showDropdown = false;
                    }, 200);
                }
            };
        }
    </script>
</x-app-layout>
