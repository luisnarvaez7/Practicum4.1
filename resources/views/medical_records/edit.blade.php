<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Medical Record') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ __('Edit Medical Record') }}</h1>
        <p class="mb-6">{{ __('Update the details of the medical record below.') }}</p>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('medical_records.update', $id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="patient_name" class="block text-sm font-medium text-gray-700">{{ __('Patient Name') }}</label>
                        <input type="text" name="patient_name" id="patient_name" value="{{ $record->patient_name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="record_date" class="block text-sm font-medium text-gray-700">{{ __('Record Date') }}</label>
                        <input type="date" name="record_date" id="record_date" value="{{ $record->date }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="details" class="block text-sm font-medium text-gray-700">{{ __('Details') }}</label>
                        <textarea name="details" id="details" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">Details about the medical record...</textarea>
                    </div>
                </div>
                <div class="mt-6">
                    <x-button>{{ __('Update') }}</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
