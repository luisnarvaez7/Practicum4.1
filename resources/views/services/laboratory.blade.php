<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laboratory Services') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ __('Laboratory Services') }}</h1>
        <p class="mb-6">{{ __('We provide comprehensive laboratory services to support your healthcare needs.') }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ __('Blood Tests') }}</h2>
                <p>{{ __('We offer a wide range of blood tests to diagnose and monitor health conditions.') }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ __('Urine Tests') }}</h2>
                <p>{{ __('Our laboratory provides accurate and timely urine tests.') }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ __('Specialized Tests') }}</h2>
                <p>{{ __('We offer specialized tests to meet your specific healthcare needs.') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
