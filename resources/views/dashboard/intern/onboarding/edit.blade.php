<x-app-layout pageTitle="Dashboard Onboarding">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modify Onboarding') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">

            @if($intern->status === 'rejected')
            <div class="bg-red-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-900">
                    {{ __("Your submission has been rejected.") }}
                    @if($intern->rejection_reason)
                        {{ __($intern->rejection_reason) }}
                    @endif
                </div>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.intern.onboarding.partials.edit-onboarding-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
