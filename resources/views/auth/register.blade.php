@extends('layout.app')

@section('auth-buttons')
    <a class="btn btn-light col-12" href="{{ route('login') }}">Login</a>
@endsection

@section('content')
    <div class="row col-5 border rounded px-4 py-4 mx-auto my-5 align-content-center shadow-sm align-self-center">
        <a class="d-flex flex-column col-2 align-items-center mb-4 mt-3 px-5 mx-auto" href="{{ route('home') }}">
            <img src="{{  Vite::asset('resources/images/icon/weather-app.png') }}" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <p class="h5 text-center text-secondary mb-45">Registration</p>
        <form class="d-flex flex-column" action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="form-floating mb-2">
                <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="Andrew" value="{{ old('name') }}">
                <label for="floatingInputName">Name</label>
                @error('name')
                    <div class="alert text-danger fs-7 mb-0 pt-2 pb-0">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-2">
                <input type="email" name="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="floatingInputEmail">Email address</label>
                @error('email')
                    <div class="alert text-danger fs-7 mb-0 pt-2 pb-0">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-2">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="alert text-danger fs-7 mb-0 pt-2 pb-0">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-2">
                <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirmed" placeholder="Password Confirmation ">
                <label for="floatingPasswordConfirmed">Password Confirmation</label>
                @error('password_confirmation')
                    <div class="alert text-danger fs-7 mb-0 pt-2 pb-0">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary align-self-center my-4 w-100">Register</button>
        </form>
    </div>
@endsection
