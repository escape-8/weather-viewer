<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card text-body">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="flex-grow-1 mb-1">{{ $location->name }}, {{ $location->sys->country }}</h6>
                    <p class="small my-0" style="color: #868B94;">{{ $location->coord->lat }}, {{ $location->coord->lon }}</p>
                </div>
                <form class="mb-0" action="{{ route('location.remove', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn px-0 py-0 text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="d-flex flex-row text-center my-2 gap-3 align-items-center">
                <h6 class="display-4 mb-0 font-weight-bold"> {{ round($location->main->temp) }}°C </h6>
                <div>
                    <img src="{{ Vite::asset('resources/images/weather-icons/' . $location->weather[0]->icon) . '.png'  }}" alt="weather-icon"
                         width="70px">
                </div>
                <div class="d-flex flex-column align-items-start">
                    <span class="small" style="color: #868B94">{{ ucfirst($location->weather[0]->description) }}</span>
                    <span class="small" style="color: #868B94">Feels like {{ round($location->main->feels_like) }}</span>
                </div>
            </div>
            <div>
                <div class="d-flex fs-6 flex-row gap-3 gap-sm-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16" style="color: #868B94;">
                            <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5m-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2M0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5"/>
                        </svg>
                        <span class="ms-0 fs-8 ms-sm-1"> {{ $location->wind->speed}} m/s </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-droplet-fill" viewBox="0 0 16 16" style="color: #868B94;">
                            <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6M6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13"/>
                        </svg>
                        <span class="ms-1 fs-8"> {{ $location->main->humidity}}% </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16" style="color: #868B94;">
                            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
                            <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
                        </svg>
                        <span class="ms-1 fs-8"> {{ $location->main->pressure}} mmHg </span>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <form class="d-flex justify-content-center mb-0" action="{{ route('weather.forecast') }}" method="POST">
                @csrf
                <input type="hidden" name="latitude" value="{{ $location->coord->lat }}">
                <input type="hidden" name="longitude" value="{{ $location->coord->lon }}">
                <button type="submit" class="btn btn-primary d-flex justify-content-center col-6" href="">View Forecast</button>
            </form>
        </div>
    </div>
</div>
