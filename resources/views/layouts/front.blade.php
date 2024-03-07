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

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/front.scss'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body {{ $attributes }}>
        @include('front.nav')
        
        <main>{{ $slot }}</main>

        @include('front.footer')

        <svg id="bg-glow" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 800 800" opacity="0.15"><defs><filter id="bbblurry-filter" x="-100%" y="-100%" width="400%" height="400%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feGaussianBlur stdDeviation="130" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" edgeMode="none" result="blur"></feGaussianBlur></filter></defs><g filter="url(#bbblurry-filter)"><ellipse rx="189.5" ry="277.5" cx="387.37898932969586" cy="389.59564847750903" fill="#e73c7e"></ellipse></g></svg>

        <div id="bg-grain"></div>
        <div id="vignette"></div>


        <div id="particle-container"></div>

        @if (Auth::check()) 
            <a class="switchToAdmin glass" href="{{ route('dashboard') }}">
                Dashboard ⌨️
            </a>
        @endif

        @livewireScripts
    </body>
</html>
