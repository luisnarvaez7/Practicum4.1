<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Doctors') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12" x-data="doctorData()" @keydown.escape.window="closeModal()">
        <h1 class="text-2xl font-bold mb-6">Manage Doctors</h1>

        <!-- Filtros y búsqueda -->
        <div class="mb-6 flex items-center">
            <input type="text" x-model="search" placeholder="Search doctors..." class="border-gray-300 rounded mr-4">
            <select x-model="selectedSpecialization" class="border-gray-300 rounded mr-4">
                <option value="">{{ __('All Specializations') }}</option>
                @foreach($specializations as $specialization)
                    <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                @endforeach
            </select>
            <button @click="applyFilters" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Apply</button>
        </div>

        <!-- Botón para abrir el modal -->
        <button @click="openModal(false)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">Create New doctor</button>

        <!-- Tabla de médicos -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Specializations</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $doctor->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $doctor->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $doctor->email }}</td>
                            <td class="py-2 px-4 border-b">
                                @foreach($doctor->specializations as $specialization)
                                    <span class="inline-block bg-green-500 text-white rounded-full px-3 py-1 text-sm font-semibold">{{ $specialization->name }}</span>
                                @endforeach
                            </td>
                            <td class="py-2 px-4 border-b">
                                <button @click="openModal(true, {{ $doctor->id }}, {{ json_encode($doctor->specializations->toArray()) }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</button>
                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
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
            {{ $doctors->links() }}
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75" style="display: none;">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-lg" @click.away="closeModal()">
                <h2 class="text-xl font-semibold mb-4" x-text="isEdit ? 'Edit doctor' : 'Create New doctor'"></h2>
                <form @submit.prevent="saveDoctor">
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
                    <div class="mb-4">
                        <label for="specializations" class="block text-gray-700">Specializations</label>
                        <div class="flex flex-wrap">
                            <template x-for="(specialization, index) in form.specializations" :key="index">
                                <span class="bg-blue-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2 flex items-center">
                                    <span x-text="specialization.name"></span>
                                    <button type="button" @click="removeSpecialization(index)" class="ml-2 text-white font-bold">x</button>
                                </span>
                            </template>
                        </div>
                        <input type="text" x-model="searchSpecialization" @input="filterSpecializations" placeholder="Search specializations" class="w-full border-gray-300 rounded mt-1">
                        <ul x-show="filteredSpecializations.length > 0" class="bg-white border rounded mt-1 max-h-40 overflow-y-auto">
                            <template x-for="specialization in filteredSpecializations" :key="specialization.name">
                                <li @click="addSpecialization(specialization)" class="px-4 py-2 cursor-pointer hover:bg-gray-200" x-text="specialization.name"></li>
                            </template>
                        </ul>
                        <p x-text="errors.specializations" class="text-red-500 text-sm"></p>
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
        function doctorData() {
            return {
                showModal: false,
                isEdit: false,
                form: {
                    id: null,
                    name: '',
                    email: '',
                    password: '',
                    specializations: [],
                },
                errors: {},
                search: '',
                searchSpecialization: '',
                selectedSpecialization: '',
                specializations: @json($specializations->toArray()),  // Asumiendo especializaciones como objetos completos
                filteredSpecializations: [],
                openModal(edit = false, doctorId = null, doctorSpecializations = []) {
                    this.isEdit = edit;
                    this.form = {
                        id: doctorId,
                        name: doctorId ? @json($doctors).find(d => d.id === doctorId).name : '',
                        email: doctorId ? @json($doctors).find(d => d.id === doctorId).email : '',
                        specializations: doctorSpecializations,
                        password: '',
                    };
                    this.errors = {};
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                    this.form = { id: null, name: '', email: '', password: '', specializations: [] };
                    this.errors = {};
                },
                saveDoctor() {
                    const url = this.isEdit ? `/admin/doctors/${this.form.id}` : '/admin/doctors';
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
                            console.log('doctor saved successfully:', this.form);
                            this.closeModal();
                            location.reload(); // Recarga para reflejar cambios
                        })
                        .catch(error => {
                            console.error('Error saving doctor:', error);
                            this.errors = error.errors || {};
                        });
                },
                filterSpecializations() {
                    this.filteredSpecializations = this.specializations.filter(specialization => specialization.name.toLowerCase().includes(this.searchSpecialization.toLowerCase()) && !this.form.specializations.includes(specialization));
                },
                addSpecialization(specialization) {
                    this.form.specializations.push(specialization);
                    this.searchSpecialization = '';
                    this.filteredSpecializations = [];
                },
                removeSpecialization(index) {
                    this.form.specializations.splice(index, 1);
                },
                applyFilters() {
                    const params = new URLSearchParams({
                        search: this.search,
                        specialization: this.selectedSpecialization,
                    });
                    window.location.href = `?${params.toString()}`;
                }
            };
        }
    </script>
</x-app-layout>
