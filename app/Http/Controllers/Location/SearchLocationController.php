<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Services\WeatherApiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
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
                return response()->view(
                    'page.search-result',
                    ['searchError' => 'Nothing found'],
                    404
                );
            }
            return response()->view('page.search-result', ['locations' => $locations]);
        } catch (BadRequestHttpException|HttpException|UnauthorizedException $e) {
            return response()->view(
                'page.search-result',
                ['searchError' => $e->getMessage()],
                $e->getStatusCode()
            );
        }
    }
}
