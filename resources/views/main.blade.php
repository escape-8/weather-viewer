@extends('layout.app')

@section('flash')
    @if (session('status'))
        <div class="container alert alert-success mt-5">{{ session('status') }}</div>
    @endif
@endsection

@section('auth-buttons')
    @guest
        <div class="d-flex gap-2">
            <a class="btn btn-light" href="{{ route('user.login') }}">Login</a>
            <a class="btn btn-light" href="{{ route('user.create') }}">Register</a>
        </div>
    @endguest
    @auth
        <div class="d-flex gap-4">
            @include('components.logout')
            @if (!Auth::user()->hasVerifiedEmail())
                <a class="btn btn-light" href="{{ route('verification.notice') }}">Verify email</a>
            @endif
        </div>
    @endauth
@endsection

@section('content')
    @guest
        <p class="h3 text-center text-body-tertiary">Please, login or register</p>
    @endguest
@endsection
