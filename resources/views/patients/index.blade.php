<!-- resources/views/patients/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Patients') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12" x-data="patientData()" @keydown.escape.window="closeModal()">
        <h1 class="text-2xl font-bold mb-6">Manage Patients</h1>

        <!-- Filtros y búsqueda -->
        <div class="mb-6 flex items-center">
            <input type="text" x-model="search" placeholder="Search patients..." class="border-gray-300 rounded mr-4">
            <button @click="applyFilters" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Apply</button>
        </div>

        <!-- Botón para abrir el modal -->
        <button @click="openModal(false)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">Create New Patient</button>

        <!-- Tabla de pacientes -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $patient->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $patient->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $patient->email }}</td>
                            <td class="py-2 px-4 border-b">
                                <button @click="openModal(true, {{ $patient->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</button>
                                <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" style="display:inline-block;">
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
            {{ $patients->links() }}
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75" style="display: none;">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-lg" @click.away="closeModal()">
                <h2 class="text-xl font-semibold mb-4" x-text="isEdit ? 'Edit Patient' : 'Create New Patient'"></h2>
                <form @submit.prevent="savePatient">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" id="name" x-model="form.name" class="w-full border-gray-300 rounded mt-1" :class="{'border-red-500': errors.name}" required>
                        <p x-text="errors.name" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" x-model="form.email" class="w-full border-gray-300 rounded mt-1" :class="{'border-red-500': errors.email}" required>
                        <p x-text="errors.email" class="text-red-500 text-sm"></p>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" x-model="form.password" class="w-full border-gray-300 rounded mt-1" :class="{'border-red-500': errors.password}" :required="!isEdit">
                        <p x-text="errors.password" class="text-red-500 text-sm"></p>
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
        function patientData() {
            return {
                showModal: false,
                isEdit: false,
                form: {
                    id: null,
                    name: '',
                    email: '',
                    password: '',
                },
                errors: {},
                search: '',
                openModal(edit = false, patientId = null) {
                    this.isEdit = edit;
                    this.form = {
                        id: patientId,
                        name: patientId ? @json($patients).find(p => p.id === patientId).name : '',
                        email: patientId ? @json($patients).find(p => p.id === patientId).email : '',
                        password: '',
                    };
                    this.errors = {};
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                    this.form = { id: null, name: '', email: '', password: '' };
                    this.errors = {};
                },
                savePatient() {
                    const url = this.isEdit ? `/admin/patients/${this.form.id}` : '/admin/patients';
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
                            console.log('Patient saved successfully:', this.form);
                            this.closeModal();
                            location.reload(); // Recarga para reflejar cambios
                        })
                        .catch(error => {
                            console.error('Error saving patient:', error);
                            this.errors = error.errors || {};
                        });
                },
                applyFilters() {
                    const params = new URLSearchParams({
                        search: this.search,
                    });
                    window.location.href = `?${params.toString()}`;
                }
            };
        }
    </script>
</x-app-layout>
