<x-page-layout  pageTitle="Track and Trace Certificates">

    <header class="w-full px-8 xl:px-0 bg-blue-950 shadow-sm">
        @include('pages.partials.navigation')
    </header>

    <div class="w-full mx-auto">

        <section class="w-full mx-auto bg-neutral-50 min-h-screen py-10">

            <header class="text-center mb-8">
                <h1 class="text-xl md:text-2xl mb-4 font-semibold text-gray-900">
                    {{ __('Check Attestation or Certificate') }}
                </h1>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Verify the validity of your attestation or certificate using the reference") }}
                </p>
            </header>

            <div class="container max-w-7xl mx-auto px-8 md:px-0 space-y-8">

                <form action="" method="GET">
                    <div class="flex items-center max-w-2xl mx-auto">
                        <x-text-input type="search" name="reference" class="block w-full rounded-e-none" placeholder="Reference" :value="old('reference', request()->query('reference'))" />
                        <x-primary-button class="!text-base py-2 rounded-s-none !bg-blue-800 hover:!bg-blue-900"> Verify </x-primary-button>
                    </div>
                </form>

                @if(request()->query('reference'))

                    @if(isset($certificate))
                        <section class="w-full py-16">
                            <div class="max-w-4xl mx-auto px-8">

                                <div class="bg-white shadow-lg rounded-xl border border-gray-200 overflow-hidden">

                                    {{-- Status Header --}}
                                    <div class="p-6 text-center border-b">

                                        @if($certificate)
                                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full bg-green-100 text-green-700">
                                            ✔ Certificate Verified
                                        </span>
                                        @else
                                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full bg-red-100 text-red-700">
                                            ✖ Certificate Not Found
                                        </span>
                                        @endif


                                    </div>

                                    <div class="p-8 grid md:grid-cols-2 gap-8">

                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                                Certificate Information
                                            </h3>

                                            <div class="space-y-3 text-lg">

                                                <p>
                                                    <span class="font-medium text-gray-700">Recipient:</span>
                                                    {{ $certificate->getRecipient->name ?? $certificate->content['name'] ?? "--" }}
                                                </p>

                                                <p>
                                                    <span class="font-medium text-gray-700">Matricule:</span>
                                                    {{ $certificate->getRecipient->intern->matricule ?? '--' }}
                                                </p>

                                                <p>
                                                    <span class="font-medium text-gray-700">Reference:</span>
                                                    {{ $certificate->reference }}
                                                </p>

                                                <p>
                                                    <span class="font-medium text-gray-700">Issued Date:</span>
                                                    {{ $certificate->created_at->format('d M Y') }}
                                                </p>

                                                <p>
                                                    <span class="font-medium text-gray-700">Issued By:</span>
                                                    {{ setting('company_name') }}
                                                </p>

                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </section>
                    @else
                        <section class="w-full py-16">
                            <div class="max-w-4xl mx-auto px-8">

                                <div class="bg-white shadow-lg rounded-xl border border-gray-200 overflow-hidden">

                                    {{-- Status Header --}}
                                    <div class="p-6 text-center border-b">

                                    
                                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full bg-red-100 text-red-700">
                                            ✖ Certificate Not Found
                                        </span>
                                    

                                    </div>

                                
                                </div>

                            </div>
                        </section>
                    @endif

                @endif
            </div>



        </section>
    </div>



</x-page-layout>
