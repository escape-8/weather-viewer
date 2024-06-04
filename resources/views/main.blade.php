@extends('layout.app')

@section('flash')
    @if (session('status'))
        <div class="container alert alert-{{ session('alert') ?? 'success' }} mt-5 text-center">
            {{ session('status') }}
        </div>
    @endif
@endsection

@section('auth-buttons')
    @guest
        <a class="btn btn-light col-6" href="{{ route('login') }}">Login</a>
        <a class="btn btn-light col-6" href="{{ route('user.create') }}">Register</a>
    @endguest
    @auth
        @include('components.logout')
        @if (!Auth::user()->hasVerifiedEmail())
            <a class="btn btn-light" href="{{ route('verification.notice') }}">Verify email</a>
        @endif
    @endauth
@endsection

@section('content')
    @guest
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <p class="h3 text-center text-body-tertiary">Please, login or register</p>
        </div>
    @endguest
@endsection
