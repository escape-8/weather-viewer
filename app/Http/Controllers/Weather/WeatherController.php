<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
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

}
