<x-app-layout pageTitle="Dashboard Home">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">



            <div>
                <h4 class="text-base uppercase tracking-wider font-semibold ">Your Matricule</h4>
                <div class="bg-white border border-gray-200  py-5 px-8 rounded-lg mt-4 shadow overflow-hidden  flex items-center justify-center h-full text-gray-900 text-lg md:text-xl tracking-widest font-bold uppercase">
                    {{ Auth::user()->intern->matricule ?? "" }}
                </div>
            </div>




            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.intern.update') }}" method="POST" class="space-y-5">
                        @csrf
                        @method('patch')
                        <div class="w-full">
                            <x-input-label for="portfolio_link" :value="__('Your Portfolio Link')" />
                            <x-text-input id="portfolio_link" name="portfolio_link" type="text" class="mt-1 block w-full" :value="old('portfolio_link', $portfolioLink)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Information') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
