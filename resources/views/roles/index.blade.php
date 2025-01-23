<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Roles') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12" x-data="roleData()" @keydown.escape.window="closeModal()">
        <h1 class="text-2xl font-bold mb-6">Manage Roles</h1>

        <!-- Button to open the modal -->
        <button @click="openModal(false)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">Create New Role</button>

        <!-- Roles Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Permissions</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $role->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $role->name }}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="max-h-24 overflow-y-auto">
                                    <ul class="list-disc list-inside">
                                        @foreach($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <button @click="openModal(true, {{ $role }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</button>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
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
                <h2 class="text-xl font-semibold mb-4" x-text="isEdit ? 'Edit Role' : 'Create New Role'"></h2>
                <form :action="isEdit ? '{{ url('admin/roles') }}/' + role.id : '{{ route('admin.roles.store') }}'" method="POST">
                    @csrf
                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Role Name</label>
                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded mt-1" x-model="role.name" required>
                    </div>
                    <div class="mb-4">
                        <label for="permissions" class="block text-gray-700">Permissions</label>
                        <div class="relative">
                            <input type="text" placeholder="Search permissions..." class="w-full border-gray-300 rounded mt-1" x-model="searchTerm" @input="filterPermissions" @focus="showDropdown = true" @blur="hideDropdown">
                            <div class="absolute z-10 bg-white border border-gray-300 mt-1 w-full max-h-40 overflow-y-auto" x-show="showDropdown && (filteredPermissions.length > 0 || searchTerm === '')">
                                <template x-for="permission in (searchTerm === '' ? permissions.slice(0, 3) : filteredPermissions)" :key="permission.id">
                                    <div @click="togglePermission(permission)" class="cursor-pointer px-4 py-2 hover:bg-gray-200" x-text="permission.name"></div>
                                </template>
                            </div>
                        </div>
                        <div class="mt-2 max-h-24 overflow-y-auto">
                            <template x-for="permission in role.permissions" :key="permission.id">
                                <span class="inline-block bg-blue-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">
                                    <span x-text="permission.name"></span>
                                    <button type="button" @click="togglePermission(permission)" class="ml-2 text-white">&times;</button>
                                </span>
                            </template>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" @click="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" x-text="isEdit ? 'Update Role' : 'Create Role'"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function roleData() {
            return {
                showModal: false,
                isEdit: false,
                showDropdown: false,
                role: {
                    id: null,
                    name: '',
                    permissions: []
                },
                permissions: @json($permissions),
                searchTerm: '',
                filteredPermissions: [],
                openModal(edit = false, role = { id: null, name: '', permissions: [] }) {
                    this.isEdit = edit;
                    this.role = {
                        ...role,
                        permissions: role.permissions ? role.permissions.map(p => ({ id: p.id, name: p.name })) : []
                    };
                    this.filteredPermissions = this.permissions;
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                    this.showDropdown = false;
                },
                filterPermissions() {
                    this.filteredPermissions = this.permissions.filter(permission => permission.name.toLowerCase().includes(this.searchTerm.toLowerCase()));
                },
                togglePermission(permission) {
                    const index = this.role.permissions.findIndex(p => p.id === permission.id);
                    if (index === -1) {
                        this.role.permissions.push(permission);
                    } else {
                        this.role.permissions.splice(index, 1);
                    }
                },
                hideDropdown() {
                    setTimeout(() => {
                        this.showDropdown = false;
                    }, 200);
                }
            }
        }
    </script>
</x-app-layout>
