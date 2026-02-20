<x-page-layout>

    <header class="w-full px-8 xl:px-0 bg-blue-950 shadow-sm">
        @include('pages.partials.navigation')
    </header>

    <div class="w-full mx-auto">
        
        <section class="w-full mx-auto bg-neutral-50 py-20">
            
            <header class="text-center mb-8">
                <h1 class="text-3xl mb-4 font-medium text-gray-900">
                    {{ __('Check Attestation or Certificate') }}
                </h1>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Verify the validity of your attestation or certificate using the reference") }}
                </p>
            </header>

            <div class="container max-w-7xl mx-auto px-8 md:px-0">

                <form action="">
                    <div class="flex items-center max-w-2xl mx-auto">
                        <x-text-input class="block w-full rounded-e-none" placeholder="Reference" />
                        <x-primary-button class="!text-base py-2 rounded-s-none !bg-blue-800 hover:!bg-blue-900"> Verify </x-primary-button>
                    </div>
                </form>
            </div>

        </section>
    </div>



</x-page-layout>
