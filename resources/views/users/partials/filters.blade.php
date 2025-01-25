<div class="mb-6 flex items-center">
    <input type="text" x-model="search" placeholder="Search users..." class="border-gray-300 rounded mr-4">
    <select x-model="selectedRole" class="border-gray-300 rounded mr-4">
        <option value="">{{ __('All Roles') }}</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <button @click="applyFilters" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Apply</button>
</div>
