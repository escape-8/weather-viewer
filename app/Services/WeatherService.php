<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\UserLocationDTO;
use App\Models\Location;
use App\Repositories\LocationRepository;
use App\Repositories\UserLocationRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;

class WeatherService
{
    private LocationRepository $locationRepository;
    private UserLocationRepository $userLocationRepository;
    private WeatherApiService $weatherApi;

    public function __construct(
        UserLocationRepository $userLocationRepository,
        WeatherApiService $weatherApi,
        LocationRepository $locationRepository
    ) {
        $this->userLocationRepository = $userLocationRepository;
        $this->weatherApi = $weatherApi;
        $this->locationRepository = $locationRepository;
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

    public function getForecastByLocation(UserLocationDTO $forecastLocation): object
    {
            $this->userLocationRepository->checkIfUserHasLocation($forecastLocation);
            $location = $this->locationRepository->getById($forecastLocation->locationId);
            $forecast = $this->weatherApi->getForecastWeatherByCoordinates(
                $location->getAttribute('latitude'),
                $location->getAttribute('longitude')
            );
            $forecast->city->name = $location->getAttribute('name');
            return $forecast;
    }
}
