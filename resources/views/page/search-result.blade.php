@extends('layout.app')

@section('auth-buttons')
    <div class="d-flex gap-4">
        @include('components.logout')
    </div>
@endsection

@section('flash')
    @if (session('status'))
        <div class="container alert alert-{{ session('alert') ?? 'success' }} mt-5 text-center">
            {{ session('status') }}
        </div>
    @endif
@endsection

@section('content')
    <div class="my-5 d-flex flex-wrap align-items-start justify-content-center gap-5 h-50 w-100">
        @isset ($searchError)
            <div class="container alert alert-danger text-center mb-0" role="alert">
                {{ $searchError }}
            </div>
        @endisset
        @isset ($locations)
            @foreach($locations as $location)
                @include('components.search-card', ['location' => $location])
            @endforeach
        @endisset
    </div>
@endsection
