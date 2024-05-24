<nav class="navbar bg-primary" data-bs-theme="dark">
    <div class="container flex-row">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('icon/weather-app.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            Weather
        </a>
        @yield('auth-buttons')
    </div>
</nav>
