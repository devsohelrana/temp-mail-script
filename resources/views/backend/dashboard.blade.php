<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-20 py-10 bg-white">
                    <div class="text-2xl">
                        {{ __('Hi') }} {{ Auth::user()->name }}!
                    </div>
                    <div class="mt-2 text-gray-500">
                        {{ __('Welcome to Priyo Mail Dashboard') }}
                    </div>
                </div>
                <div class="bg-gray-50 text-gray-800 grid gap-5 grid-cols-1 md:grid-cols-3 px-20 py-10">



                </div>
                <div class="bg-white grid grid-cols-1 md:grid-cols-2">
                    <div class="px-20 py-10">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-24 h-24 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                            <div class="ml-6">
                                <div class="text-lg text-gray-600 leading-7 font-semibold">{{ __('Email IDs Created') }}
                                </div>
                                <div class="mt-2 text-2xl text-gray-500">
                                    {{ number_format(App\Models\Meta::getEmailIdsCreated()) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-20 py-10">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-24 h-24 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                            </svg>
                            <div class="ml-6">
                                <div class="text-lg text-gray-600 leading-7 font-semibold">{{ __('Messages Received') }}
                                </div>
                                <div class="mt-2 text-2xl text-gray-500">
                                    {{ number_format(App\Models\Meta::getMessagesReceived()) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
