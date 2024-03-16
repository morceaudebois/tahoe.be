<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('metatags')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/scss/front.scss'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body {{ $attributes }}>
        @include('front.nav')

        <main>{{ $slot }}</main>

        @include('front.footer')

        <svg id="bg-glow" viewBox="0 0 800 800"><defs><filter id="bbblurry-filter" x="-100%" y="-100%" width="400%" height="400%"><feGaussianBlur stdDeviation="130" in="SourceGraphic" result="blur"/></filter></defs><g filter="url(#bbblurry-filter)"><ellipse rx="189.5" ry="277.5" cx="387.37898932969586" cy="389.59564847750903" fill="#e73c7e"/></g></svg>

        <div id="bg-grain"></div>
        <div id="vignette"></div>
        <div id="particle-container"></div>

        @if (Auth::check()) 
            <a class="switchToAdmin glass" href="{{ route('dashboard') }}">
                Dashboard ⌨️
            </a>
        @endif

        @livewireScripts
        @vite(['resources/js/app.js'])
    </body>
</html>
