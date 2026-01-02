@props(["pageTitle" => ""])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
        <title>{{ config('app.name', 'Laravel') }}  {{ $pageTitle ? " - " . $pageTitle : "" }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-900">

            <!-- Page Content -->
            <main>
                <!-- Content -->
                <section id="content" class="min-h-screen w-full transition-all ease-in-out duration-300">

                    {{ $slot }}

                </section>
            </main>
        </div>
    </body>
</html>