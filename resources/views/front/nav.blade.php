<nav class="min-h-36 flex flex-row justify-between align-center max-w-6xl m-auto px-4 dark:text-white">
    <div class="flex flex-col justify-center">
        <a href="" href="{{ route('home') }}" alt="homepage" title="homepage">
            <p class="text-2xl font-medium">Tahoe / morceaudebois 🪵</p>
            <p class="text-xl">{{ __('Maker of things (sometimes)') }}</p>
        </a>
    </div>

    <ul class="flex items-center gap-7 opacity-80 text-2xl">
        <li>
            <a href="{{ route('home') }}">Projects</a>
        </li>

        <li>
            <a href="{{ route('photography') }}">Photography</a>
        </li>

        <li>
            <a href="{{ route('about') }}">About</a>
        </li>
    </ul>
</nav>