<x-page-layout pageTitle="Apply">


    <header class="w-full px-8 xl:px-0 bg-blue-950 shadow-sm">
        @include('pages.partials.navigation')
    </header>

    
    <div class="max-w-3xl mx-auto py-8 px-8 xl:px-0 pb-20">

        <header class="text-center">
            <h1 class="text-3xl mb-4 font-medium text-gray-900">
                {{ __('Apply for an Internship') }}
            </h1>
    
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Fill in the required fields below to apply.") }}
            </p>
        </header>
        
        @include('pages.partials.application-form')
    </div>
    

</x-page-layout>