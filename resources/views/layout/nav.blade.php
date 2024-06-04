<nav class="navbar bg-primary py-3">
    <div class="container flex-row">
        <a class="d-flex navbar-brand text-light gap-3" href="{{ route('home') }}">
            <img src="{{ Vite::asset('resources/images/icon/weather-app.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            Weather
        </a>
        @yield('auth-buttons')
    </div>
</nav>
