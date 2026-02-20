<div class="container max-w-7xl mx-auto lg:flex lg:items-center lg:justify-between lg:gap-3 py-5 text-center">
    <a href="{{ route('home') }}" class="block w-48 flex-shrink-0 mx-auto mb-8 lg:mb-0">
        <img class="w-full" src="{{ asset('images/logo-dark.png') }}" alt="Logo">
    </a>

    <nav class="w-full flex items-center justify-center gap-5 mb-8 lg:mb-0">
        <a class="text-neutral-200 hover:text-orange-600 font-semibold flex-shrink-0 uppercase tracking-wider transition-colors delay-75 ease-in-out {{ request()->routeIs('home') ? "text-orange-600" : '' }}" href="{{ route('home') }}">Home</a>
        <a class="text-neutral-200 hover:text-orange-600 font-semibold flex-shrink-0 uppercase tracking-wider transition-colors delay-75 ease-in-out {{ request()->routeIs('track') ? "text-orange-600" : '' }}" href="{{ route('track') }}">Track and Trace</a>
        <a class="text-neutral-200 hover:text-orange-600 font-semibold flex-shrink-0 uppercase tracking-wider transition-colors delay-75 ease-in-out {{ request()->routeIs('apply') ? "text-orange-600" : '' }}" href="{{ route('register') }}">Apply For Internship</a>
    </nav>



   @guest
    <a href="{{ route('login') }}" class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Account Login</a>
   @endguest

   <div class="flex justify-center items-center gap-2">
        @auth
            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
            @endif

            @if(auth()->user()->hasRole('intern'))
                <a href="" class="bg-blue-600 hover:bg-blue-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-orange-600 hover:bg-orange-800 transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Logout</button>
            </form>
    @endauth
   </div>
</div>
