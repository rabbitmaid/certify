<x-app-layout pageTitle="Generate Attestation for Batch">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Generate Attestation for Batch') }}
            </h2>
            <x-link-button href="{{ route('certificate.index') }}">Back</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <form method="post" action="{{ route('certificate.store') }}" class="mt-6 space-y-6">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('dashboard.admin.certificates.partials.create-attestation-form')
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('dashboard.admin.certificates.partials.customize-template-form')
                        <x-primary-button class="mt-5">{{ __('Create') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
