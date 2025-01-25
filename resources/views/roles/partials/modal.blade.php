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
