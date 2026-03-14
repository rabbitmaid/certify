<x-app-layout pageTitle="Generate Attestation / Certificate for Individual">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Generate Attestation / Certificate for Individual') }}
            </h2>
            <x-link-button href="{{ route('submission.index') }}">Back</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <form method="post" action="{{ route('submission.individual.generate') }}" class="mt-6 space-y-6">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <input type="hidden" name="submission_id" value="{{ $submission->id }}" />
                
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('dashboard.admin.certificates.partials.create-individual-attestation-form')
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('dashboard.admin.certificates.partials.customize-template-individual-form')
                        <x-primary-button class="mt-5">{{ __('Generate') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
