<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="dark:bg-[#0B0C14]">
        @include('front.nav')
        
        <main class="my-6 px-4 max-w-6xl mx-auto font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </main>

        <div class="grainy-bg pointer-events-none absolute inset-0 z-10 opacity-[0.08]"></div>

        @livewireScripts
    </body>
</html>
