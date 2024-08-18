<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\ConnectionException;

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
            try {
                $locations = $this->weatherService->getUserLocationsWeatherPage($user);
                return response()->view('main', ['locations' => $locations]);
            } catch (ConnectionException) {
                session()->flash('status', 'The weather service is temporarily unavailable, please try again later.');
                session()->flash('alert','danger');
                return response()->view('main', [], 503);
            }
        }
        return response()->view('main');
    }

}
