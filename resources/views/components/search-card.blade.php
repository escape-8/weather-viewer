<div class="card shadow-0 border col-5">
    <div class="card-body p-4">
        <h4 class="mb-1 sfw-normal">{{ $location->name }}, {{ $location->country }}</h4>
        <p class="mb-2">latitude: <strong>{{ $location->lat }}</strong></p>
        <p>longitude <strong>{{ $location->lon }}</strong></p>
        <form action="{{ route('location.add') }}" method="POST">
            @csrf
            <input type="hidden" name="latitude" value="{{ $location->lat }}">
            <input type="hidden" name="longitude" value="{{ $location->lon }}">
            <input type="hidden" name="name" value="{{ $location->name }}">
            <button type="submit" class="btn btn-primary">Tracking</button>
        </form>
    </div>
</div>
