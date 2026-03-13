<x-app-layout pageTitle="Dashboard Home">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

              <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                

                <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-lg font-semibold text-gray-700">Interns</h3>
                    <p class="mt-4 text-3xl font-bold text-primary">{{ $interns ?? 0 }}</p>
                </div>

              
                <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-lg font-semibold text-gray-700">Certificates</h3>
                    <p class="mt-4 text-3xl font-bold text-primary">{{ $certificates ?? 0 }}</p>
                </div>

          
                <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-lg font-semibold text-gray-700">Templates</h3>
                    <p class="mt-4 text-3xl font-bold text-primary">{{ $templates ?? 0 }}</p>
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
