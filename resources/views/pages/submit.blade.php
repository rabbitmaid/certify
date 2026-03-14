<x-page-layout pageTitle="Submit Certificate Request">

    <header class="w-full px-8 xl:px-0 bg-blue-950 shadow-sm">
        @include('pages.partials.navigation')
    </header>

    <div class="w-full mx-auto">

        <section class="max-w-4xl w-full mx-auto min-h-screen py-10">

            <header class="text-center mb-8">
                <h1 class="text-xl md:text-2xl mb-4 font-semibold text-gray-900">
                    {{ __('Submit Attestation or Certificate Request') }}
                </h1>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Verify your information before submitting") }}
                </p>
            </header>

           @include('pages.partials.submission-form')

        </section>
    </div>



</x-page-layout>
