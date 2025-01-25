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
