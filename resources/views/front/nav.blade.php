<nav>
    <div id="left">
        <a href="{{ route('home') }}" alt="homepage" title="homepage">
            <h1>Tahoe / morceaudebois 🪵</h1>
            <h2>{{ __('Maker of things (sometimes)') }}</h2>
        </a>
    </div>

    <ul id="right">
        <li>
            <a href="{{ route('home') }}" @class([
                'active' => request()->routeIs('home'),
            ])>Projects</a>
        </li>

        <li>
            <a href="{{ route('photography') }}" @class([
                'active' => request()->routeIs('photography'),
            ])>Photography</a>
        </li>

        <li>
            <a href="{{ route('about') }}" @class([
                'active' => request()->routeIs('about'),
            ])>About</a>
        </li>
    </ul>
</nav>