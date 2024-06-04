<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Services\WeatherApiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SearchLocationController extends Controller
{
    private WeatherApiService $apiService;

    public function __construct(WeatherApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function show(Request $request): Response|RedirectResponse
    {
        try {
            $locations = $this->apiService->getLocationByCityName($request->get('location'));
            if (empty($locations)) {
                return back()
                    ->with('status', 'Nothing found')
                    ->with('alert', 'danger');
            }
            return response()->view('page.search-result', ['locations' => $locations]);
        } catch (BadRequestException|HttpException $e) {
            return back()
                ->with('status', $e->getMessage())
                ->with('alert', 'danger');
        }
    }
}
