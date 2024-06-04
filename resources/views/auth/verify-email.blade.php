@extends('layout.app')

@section('auth-buttons')
        @include('components.logout')
@endsection

@section('flash')
    @if (session('status'))
        <div class="container alert alert-success mt-5">{{ session('status') }}</div>
    @endif
@endsection

@section('content')
    <div class="row col-5 border rounded px-4 py-4 mx-auto align-content-center align-self-center mb-6 shadow-sm h-50">
        <a class="d-flex flex-column col-2 align-items-center mb-4 mt-3 px-5 mx-auto" href="{{ route('home') }}">
            <img src="{{  Vite::asset('resources/images/icon/weather-app.png') }}" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <p class="h5 text-center text-secondary mb-45">Email Verify</p>
        <form class="d-flex flex-column" action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary align-self-center my-4 w-100">Send Verify Email Link</button>
        </form>
    </div>
@endsection
