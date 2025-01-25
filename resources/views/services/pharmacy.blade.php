<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pharmacy Services') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ __('Pharmacy Services') }}</h1>
        <p class="mb-6">{{ __('We offer a wide range of pharmacy services to meet your needs.') }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ __('Prescription Refills') }}</h2>
                <p>{{ __('Get your prescriptions refilled quickly and easily.') }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ __('Medication Counseling') }}</h2>
                <p>{{ __('Our pharmacists are available to provide medication counseling.') }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ __('Over-the-Counter Medications') }}</h2>
                <p>{{ __('We offer a variety of over-the-counter medications.') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
