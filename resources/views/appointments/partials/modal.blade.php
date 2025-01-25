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
                <label for="doctor_id" class="block text-gray-700">Doctor</label>
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
