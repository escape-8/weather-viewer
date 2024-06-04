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
    @auth
        <div class="d-flex flex-column justify-content-between align-items-center gap-4 py-5 w-100">
            <div class="d-flex flex-wrap justify-content-center w-100 column-gap-5 row-gap-4 mb-5">
                @foreach($locations->items() as $id => $location)
                    @include('components.location-card', ['location' => $location, 'id' => $id])
                @endforeach
            </div>
            <div class="align-self-center">
                {{ $locations->links() }}
            </div>
        </div>
    @endauth
    @guest
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <p class="h3 text-center text-body-tertiary">Please, login or register</p>
        </div>
    @endguest
@endsection
