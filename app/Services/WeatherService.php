<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Location;
use App\Repositories\UserLocationRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;

class WeatherService
{
    private UserLocationRepository $userLocationRepository;
    private WeatherApiService $weatherApi;

    public function __construct(UserLocationRepository $userLocationRepository, WeatherApiService $weatherApi)
    {
        $this->userLocationRepository = $userLocationRepository;
        $this->weatherApi = $weatherApi;
    }

    public function getUserLocationsWeatherPage(Authenticatable $user): LengthAwarePaginator
    {
        $countUserLocations = $this->userLocationRepository->getTotalCountUserLocations($user);
        $coordinatesLocations = $this->userLocationRepository->getCoordinateLocationsByUser($user);

        $locations = [];
        foreach ($coordinatesLocations as $coordinatesLocation) {
            /** @var Location $coordinatesLocation **/
            $locations[$coordinatesLocation->getOriginal('pivot_location_id')] = $this->weatherApi->getWeatherByCoordinates(
                $coordinatesLocation->getAttribute('latitude'),
                $coordinatesLocation->getAttribute('longitude')
            );
            $locations[$coordinatesLocation->getOriginal('pivot_location_id')]
                ->name = $coordinatesLocation->getAttribute('name');
        }
        return new LengthAwarePaginator($locations, $countUserLocations, 4);
    }
}
