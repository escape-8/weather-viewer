<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WeatherApiService
{
    private string $apiKey;
    private string $geoLink;
    private string $weatherLink;
    private string $forecastLink;
    private string $unitsOfMeasurement = 'metric';
    private int $numberOfTimestamps = 8;
    private int $limitReturnLocation = 4;

    public function __construct()
    {
        $this->apiKey = env('WEATHER_API_KEY');
        $this->geoLink = 'https://api.openweathermap.org/geo/1.0/direct';
        $this->weatherLink = 'https://api.openweathermap.org/data/2.5/weather';
        $this->forecastLink = 'https://api.openweathermap.org/data/2.5/forecast';
    }


    public function getLocationByCityName(?string $cityName): array|object
    {
        $response = Http::withQueryParameters([
            'q' => $cityName,
            'limit' => $this->limitReturnLocation,
            'appid' => $this->apiKey,
        ])->get($this->geoLink);

        $statusCode = $response->status();

        return match ($statusCode) {
            200 => $response->object(),
            400 => throw new BadRequestHttpException($response->object()->message, null , $statusCode),
            401 => throw new HttpException($statusCode, 'Unauthorized weather request'),
            default => throw new HttpException($statusCode, $response->object()->message),
        };
    }

    public function getWeatherByCoordinates(string $latitude, string $longitude): object
    {
        $response = Http::acceptJson()->get($this->weatherLink,
            [
            'lat' => $latitude,
            'lon' => $longitude,
            'appid' => $this->apiKey,
            'units' => $this->unitsOfMeasurement,
        ]);
        return $response->object();
    }

    public function getForecastWeatherByCoordinates(string $latitude, string $longitude): object
    {
        $response = Http::withQueryParameters([
            'lat' => $latitude,
            'lon' => $longitude,
            'appid' => $this->apiKey,
            'units' => $this->unitsOfMeasurement,
            'cnt' => $this->numberOfTimestamps,
        ])->get($this->forecastLink);
        return $response->object();
    }
}
