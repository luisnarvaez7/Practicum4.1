<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ __('Emergency Services') }}</h1>
    <p class="mb-6">{{ __('We provide 24/7 emergency services to ensure you receive the best care when you need it the most.') }}</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">{{ __('Immediate Care') }}</h2>
            <p>{{ __('Our team is ready to provide immediate care for any emergency situation.') }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">{{ __('Advanced Equipment') }}</h2>
            <p>{{ __('We use state-of-the-art equipment to diagnose and treat emergency conditions.') }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">{{ __('Experienced Staff') }}</h2>
            <p>{{ __('Our staff is highly trained and experienced in handling all types of emergencies.') }}</p>
        </div>
    </div>
</div>
</x-app-layout>
