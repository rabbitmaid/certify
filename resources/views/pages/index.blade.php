<x-page-layout pageTitle="Home">


    <header class="w-full px-8 xl:px-0 bg-white shadow-sm">
        @include('pages.partials.navigation')
    </header>

    <div class=" min-h-screen bg-pattern">

        <section class="w-full mx-auto mb-10 px-8 xl:px-0 py-40">
            <div class="container mx-auto flex flex-col items-center justify-center">

                <div class="max-w-3xl">
                    <h1 class="text-3xl lg:text-4xl xl:text-5xl font-semibold leading-snug xl:leading-normal capitalize mb-8 text-neutral-100 text-center">
                        Manage Internship <span class="text-orange-600"> Attestations </span> and <span class="text-orange-600"> Certificates </span> all in one place</h1>

                    <div class="flex items-center justify-center gap-3">
                        <a href="{{ route('apply') }}" class="text-white bg-blue-600 hover:bg-blue-600 rounded-lg block w-full py-2 px-3 hover:bg-blue-800 transition-all ease-in-out max-w-32 text-center">Apply Now</a>

                        @auth
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('dashboard') }}" class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
                            @endif

                            @if(auth()->user()->hasRole('intern'))
                                <a href="" class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
                            @endif
                        @endauth

                        @guest
                        <a href="{{ route('login') }}" class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-full flex-shrink-0 max-w-32 text-center">Login</a>
                        @endguest

                    </div>
                </div>

            </div>
        </section>

        <section class="w-full mx-auto bg-neutral-50 bg-rough backdrop:blur-xl border-y-2 py-10 px-8 xl:px-0">

            <div class="container max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-16">
                <img class="w-40 lg:w-1/6" src="{{ asset('images/laravel.png') }}" alt="Laravel Logo">
                <img class="w-40 lg:w-1/6" src="{{ asset('images/Mysql_logo.png') }}" alt="MySQL Logo">
                <img class="w-40 lg:w-[12%]" src="{{ asset('images/php.svg') }}" alt="PHP Logo">
                <img class="w-40 lg:w-1/6" src="{{ asset('images/tailwindcss.png') }}" alt="Tailwindcss Logo">
                <img class="w-40 lg:w-1/6" src="{{ asset('images/alpine.svg') }}" alt="Alpine JS Logo">
            </div>
        </section>
    </div>


</x-page-layout>
