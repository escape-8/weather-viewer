@extends('layout.app')

@section('auth-buttons')
    <a class="btn btn-light" href="{{ route('user.create') }}">Register</a>
@endsection

@section('flash')
    @if (session('status'))
        <div class="container alert alert-success mt-5">{{ session('status') }}</div>
    @endif
@endsection

@section('content')
    <body class="container d-flex align-content-between justify-content-center flex-column min-vh-100 bg-light-subtle">
        <div class="row col-5 border rounded px-4 py-4 mx-auto align-content-center mb-6 shadow-sm">
            <a class="d-flex flex-column col-2 align-items-center mb-4 mt-3 px-5 mx-auto" href="{{ route('home') }}">
                <img src="{{ asset('icon/weather-app.png') }}" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            <p class="h5 text-center text-secondary mb-45">Login</p>
            <form class="d-flex flex-column" action="{{ route('user.auth') }}" method="POST">
                @csrf
                <div class="form-floating mb-4">
                    <input type="email" name="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com">
                    <label for="floatingInputEmail">Email address</label>
                    @error('email')
                        <div class="alert text-danger fs-7 mb-0 pt-2 pb-0">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-4">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div>
                        <a href="{{ route('password.forgot') }}">Forgot your password?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary align-self-center my-4 w-100">Login</button>
            </form>
        </div>
    </body>
@endsection
