<div class="container max-w-7xl mx-auto lg:flex lg:items-center lg:justify-between lg:gap-3 py-5 text-center">
    <a href="{{ route('home') }}" class="block w-48 flex-shrink-0 mx-auto mb-8 lg:mb-0">
        <img class="w-full" src="{{ asset('images/logo-light.png') }}" alt="Logo">
    </a>

    <nav class="w-full flex items-center justify-center gap-5 mb-8 lg:mb-0">
        <a class="text-neutral-800 hover:text-orange-600 font-semibold flex-shrink-0 {{ request()->routeIs('home') ? "text-primary" : '' }}" href="{{ route('home') }}">Home</a>
        <a class="text-neutral-800 hover:text-orange-600 font-semibold flex-shrink-0" href="#">About Us</a>
        <a class="text-neutral-800 hover:text-orange-600 font-semibold flex-shrink-0" href="#">Features</a>
    </nav>

    <a href="{{ route('apply') }}" class="bg-blue-600 hover:bg-blue-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Apply Now</a>

   @guest
    <a href="{{ route('login') }}" class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Login</a>
   @endguest

   @auth
        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('dashboard') }}" class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
        @endif

        @if(auth()->user()->hasRole('intern'))
            <a href="" class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
        @endif
   @endauth
</div>

{{-- <hr class="dark:border-neutral-700" /> --}}