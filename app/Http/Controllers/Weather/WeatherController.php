<?php

namespace App\Http\Controllers\Weather;

use App\DTO\ForecastDTO;
use App\Http\Controllers\Controller;
use App\Services\WeatherApiService;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    private WeatherApiService $weatherApi;
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService, WeatherApiService $weatherApi)
    {
        $this->weatherService = $weatherService;
        $this->weatherApi = $weatherApi;
    }

    public function index(): Response
    {
        $user = Auth::user();

        if ($user) {
            $locations = $this->weatherService->getUserLocationsWeatherPage($user);
            return response()->view('main', ['locations' => $locations]);
        }
        return response()->view('main');
    }

    public function show(Request $request): Response
    {
        $forecastDTO = new ForecastDTO($request->all());
        $forecast = $this->weatherApi->getForecastWeatherByCoordinates($forecastDTO->latitude, $forecastDTO->longitude);
        return response()->view('page.forecast', compact('forecast'));
    }
}
