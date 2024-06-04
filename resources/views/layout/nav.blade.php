<nav class="navbar bg-primary py-3">
    <div class="container flex-row">
        <a class="d-flex navbar-brand text-light gap-3" href="{{ route('home') }}">
            <img src="{{ Vite::asset('resources/images/icon/weather-app.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            Weather
        </a>
        @auth
            @include('components.search-bar')
        @endauth
        <div class="d-flex gap-4 align-items-center">
            @yield('auth-buttons')
        </div>
    </div>
</nav>
