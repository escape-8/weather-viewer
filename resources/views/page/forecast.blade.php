@extends('layout.app')

@section('auth-buttons')
    <div class="d-flex gap-4">
        @include('components.logout')
    </div>
@endsection

@section('content')
    <div class="my-5 d-flex flex-column align-items-center gap-4 justify-content-between">
        <h4 class="mb-0">{{ $forecast->city->name }}, {{ $forecast->city->country }}</h4>
        <div class="d-flex justify-content-center flex-wrap gap-4 col-7 col-sm-10 col-lg-11 col-xl-10 col-xxl-8">
            @foreach($forecast->list as $forecastItem)
                @include('components.forecast-card', ['forecastItem' => $forecastItem, 'timezone' => $forecast->city->timezone])
            @endforeach
        </div>
        <a class="btn btn-primary w-12rem" href="{{ route('home') }}">Back</a>
    </div>
@endsection
