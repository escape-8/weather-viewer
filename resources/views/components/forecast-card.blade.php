<div class="card shadow-0 border w-12rem">
    <div class="card-body p-4 d-flex flex-column">
        <div class="d-flex justify-content-between">
            <p class="text-black fw-medium mb-0">{{ date('D j', $forecastItem->dt + $timezone) }}</p>
            <p class="text-secondary mb-1">{{ date('H:i', $forecastItem->dt + $timezone) }}</p>
        </div>
        <img class="align-self-center"
             src="{{ Vite::asset('resources/images/weather-icons/' . $forecastItem->weather[0]->icon . '.png') }}"
             alt="weather-icon"
             width="70px">
        <p class="text-secondary text-center fs-6 mb-1">{{ ucfirst($forecastItem->weather[0]->description) }}</p>
        <h4 class="mb-1 sfw-normal mb-3 text-center">
            @if( round($forecastItem->main->temp) > 0)
                +{{ round($forecastItem->main->temp) }}
            @elseif(round($forecastItem->main->temp) < 0)
                -{{ round($forecastItem->main->temp) }}
            @else
                {{ round($forecastItem->main->temp) }}
            @endif
            °C
        </h4>
        <div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16" style="color: #868B94;">
                    <path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5m-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2M0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5"/>
                </svg>
                <span class="ms-1 fs-7"> {{ $forecastItem->wind->speed}} m/s </span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-droplet-fill" viewBox="0 0 16 16" style="color: #868B94;">
                    <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6M6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13"/>
                </svg>
                <span class="ms-1 fs-7"> {{ $forecastItem->main->humidity}}% </span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16" style="color: #868B94;">
                    <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
                    <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
                </svg>
                <span class="ms-1 fs-7"> {{ $forecastItem->main->pressure}} mmHg </span>
            </div>
        </div>

    </div>
</div>
