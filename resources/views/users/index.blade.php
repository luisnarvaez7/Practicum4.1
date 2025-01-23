<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12" x-data="userData()" @keydown.escape.window="closeModal()">
        <h1 class="text-2xl font-bold mb-6">Manage Users</h1>

        <!-- Botón para abrir el modal -->
        <button @click="openModal(false)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">Create New User</button>

        <!-- Tabla de usuarios -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Roles</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b">
                                @foreach($user->roles as $role)
                                    <span class="inline-block bg-green-500 text-white rounded-full px-3 py-1 text-sm font-semibold">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="py-2 px-4 border-b">
                                <button @click="openModal(true, {{ $user->id }}, {{ json_encode($user->roles->toArray()) }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</button>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
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

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75" style="display: none;">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-lg" @click.away="closeModal()">
                <h2 class="text-xl font-semibold mb-4" x-text="isEdit ? 'Edit User' : 'Create New User'"></h2>
                <form @submit.prevent="saveUser">
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
                        <label for="roles" class="block text-gray-700">Roles</label>
                        <div class="flex flex-wrap">
                            <template x-for="(role, index) in form.roles" :key="index">
                                <span class="bg-blue-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2 flex items-center">
                                    <span x-text="role.name"></span>
                                    <button type="button" @click="removeRole(index)" class="ml-2 text-white font-bold">x</button>
                                </span>
                            </template>
                        </div>
                        <input type="text" x-model="search" @input="filterRoles" placeholder="Search roles" class="w-full border-gray-300 rounded mt-1">
                        <ul x-show="filteredRoles.length > 0" class="bg-white border rounded mt-1 max-h-40 overflow-y-auto">
                            <template x-for="role in filteredRoles" :key="role.name">
                                <li @click="addRole(role)" class="px-4 py-2 cursor-pointer hover:bg-gray-200" x-text="role.name"></li>
                            </template>
                        </ul>
                        <p x-text="errors.roles" class="text-red-500 text-sm"></p>
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
        function userData() {
            return {
                showModal: false,
                isEdit: false,
                form: {
                    id: null,
                    name: '',
                    email: '',
                    password: '',
                    roles: [],
                },
                errors: {},
                search: '',
                roles: @json($roles->toArray()),  // Asumiendo roles como objetos completos
                filteredRoles: [],
                openModal(edit = false, userId = null, userRoles = []) {
                    this.isEdit = edit;
                    this.form = {
                        id: userId,
                        name: userId ? @json($users).find(u => u.id === userId).name : '',
                        email: userId ? @json($users).find(u => u.id === userId).email : '',
                        roles: userRoles,
                        password: '',
                    };
                    this.errors = {};
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                    this.form = { id: null, name: '', email: '', password: '', roles: [] };
                    this.errors = {};
                },
                saveUser() {
                    const url = this.isEdit ? `/admin/users/${this.form.id}` : '/admin/users';
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
                            console.log('User saved successfully:', this.form);
                            this.closeModal();
                            location.reload(); // Recarga para reflejar cambios
                        })
                        .catch(error => {
                            console.error('Error saving user:', error);
                            this.errors = error.errors || {};
                        });
                },
                filterRoles() {
                    this.filteredRoles = this.roles.filter(role => role.name.toLowerCase().includes(this.search.toLowerCase()) && !this.form.roles.includes(role));
                },
                addRole(role) {
                    this.form.roles.push(role);
                    this.search = '';
                    this.filteredRoles = [];
                },
                removeRole(index) {
                    this.form.roles.splice(index, 1);
                }
            };
        }
    </script>
</x-app-layout>
