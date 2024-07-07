<?php

namespace App\Http\Controllers\Weather;

use App\DTO\UserLocationDTO;
use App\Http\Controllers\Controller;
use App\Services\WeatherService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WeatherForecastController extends Controller
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show(int $id): Response|RedirectResponse
    {
        try {
            $forecastLocation = new UserLocationDTO(Auth::id(), $id);
            $forecast = $this->weatherService->getForecastByLocation($forecastLocation);
        } catch (ModelNotFoundException) {
            return back()
            ->with('status', 'We no have records about this location')
            ->with('alert', 'danger');
        }

        return response()->view('page.forecast', compact('forecast'));
    }
}
