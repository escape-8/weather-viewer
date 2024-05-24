@extends('layout.app')

@section('flash')
    @if (session('status'))
        <div class="container alert alert-success mt-5">{{ session('status') }}</div>
    @endif
@endsection

@section('content')
    <div class="row col-5 border rounded px-4 py-4 mx-auto my-5 align-content-center shadow-sm">
        <a class="d-flex flex-column col-2 align-items-center mb-4 mt-3 px-5 mx-auto" href="{{ route('home') }}">
            <img src="{{ asset('icon/weather-app.png') }}" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <p class="h5 text-center text-secondary mb-45">Password Restore</p>
        <form class="d-flex flex-column" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-floating mb-2">
                <input type="email" name="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="floatingInputEmail">Email address</label>
                @error('email')
                <div class="alert text-danger fs-7 mb-0 pt-2 pb-0">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary align-self-center my-4 w-100">Send Reset Link</button>
        </form>
    </div>
@endsection
