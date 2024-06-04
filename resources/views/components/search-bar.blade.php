<div class="container-fluid col-6">
    <form class="d-flex mb-0" action="{{ route('location.search') }}" role="search" method="GET">
        @csrf
        <input class="form-control me-2 bg-light" type="search" name="location" value="{{ $request->location ?? '' }}" placeholder="Search location" aria-label="Search location">
        <button class="btn btn-light" type="submit">Search</button>
    </form>
</div>
