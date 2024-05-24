@extends('layout.app')

@section('auth-buttons')
    @guest
        <div class="d-flex gap-2">
            <a class="btn btn-light" href="{{ route('user.login') }}">Login</a>
            <a class="btn btn-light" href="{{ route('user.create') }}">Register</a>
        </div>
    @endguest
    @auth
        @include('components.logout')
    @endauth
@endsection

@section('content')
    @guest
        <p class="h3 text-center text-body-tertiary">Please, login or register</p>
    @endguest
@endsection
