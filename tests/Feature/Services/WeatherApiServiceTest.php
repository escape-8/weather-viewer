<?php

namespace Tests\Feature\Services;

use App\Services\WeatherApiService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\Feature\Fixtures\WeatherApiFixtures;
use Illuminate\Support\Facades\Http;
use Mockery\MockInterface;
use Tests\TestCase;

class WeatherApiServiceTest extends TestCase
{
    private WeatherApiFixtures $weatherApiFixtures;

    protected function setUp(): void
    {
        parent::setUp();
        $this->weatherApiFixtures = new WeatherApiFixtures();
    }

    public function testGetLocationByCityName(): void
    {
        $expected = $this->weatherApiFixtures->getFixture('GetLocationByCityName');

        Http::shouldReceive('withQueryParameters')
            ->with([
                'q' => 'Cheboksary',
                'limit' => 4,
                'appid' => 'apikey',
            ])
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('get')
            ->with('https://api.openweathermap.org/geo/1.0/direct')
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('object')
            ->once()
            ->andReturn($expected);

        $response = Http::withQueryParameters([
            'q' => 'Cheboksary',
            'limit' => 4,
            'appid' => 'apikey',
        ])->get('https://api.openweathermap.org/geo/1.0/direct')
            ->object();


        $this->mock(WeatherApiService::class, function (MockInterface $mock) use ($response) {
            $mock->shouldReceive('getLocationByCityName')
                ->once()
                ->with('Cheboksary')
                ->andReturn($response);
        });

        $weatherService = app(WeatherApiService::class);
        $result = $weatherService->getLocationByCityName('Cheboksary');

        $this->assertEquals($expected, $result);
    }

    public function testGetLocationByCityNameEmptyThrowBadRequestException400(): void
    {
        Http::shouldReceive('withQueryParameters')
            ->with([
                'q' => '',
                'limit' => 4,
                'appid' => 'apikey',
            ])
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('get')
            ->with('https://api.openweathermap.org/geo/1.0/direct')
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('status')
            ->once()
            ->andReturn(400);

        $statusCode = Http::withQueryParameters([
                'q' => '',
                'limit' => 4,
                'appid' => 'apikey',
            ]
        )->get('https://api.openweathermap.org/geo/1.0/direct')
         ->status();

        $this->mock(WeatherApiService::class, function (MockInterface $mock) use ($statusCode) {
            $mock->shouldReceive('getLocationByCityName')
                ->once()
                ->with('')
                ->andThrow(new BadRequestHttpException('Nothing to geocode', null , $statusCode));
        });

        $this->assertEquals(400, $statusCode);

        $weatherService = app(WeatherApiService::class);
        $this->expectException(BadRequestHttpException::class);
        $weatherService->getLocationByCityName('');


    }

    public function testGetLocationByCityNameEmptyThrowHttpException401(): void
    {
        Http::shouldReceive('withQueryParameters')
            ->with([
                'q' => 'Cheboksary',
                'limit' => 4,
                'appid' => '',
            ])
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('get')
            ->with('https://api.openweathermap.org/geo/1.0/direct')
            ->once()
            ->andReturnSelf();


        Http::shouldReceive('status')
            ->once()
            ->andReturn(401);

        $statusCode = Http::withQueryParameters([
                'q' => 'Cheboksary',
                'limit' => 4,
                'appid' => '',
            ]
        )->get('https://api.openweathermap.org/geo/1.0/direct')
            ->status();


        $this->mock(WeatherApiService::class, function (MockInterface $mock) use ($statusCode) {
            $mock->shouldReceive('getLocationByCityName')
                ->once()
                ->with('Cheboksary')
                ->andThrow(new HttpException($statusCode, 'Unauthorized weather request'));
        });

        $this->assertEquals(401, $statusCode);

        $weatherService = app(WeatherApiService::class);
        $this->expectException(HttpException::class);
        $weatherService->getLocationByCityName('Cheboksary');
    }

    public function testGetLocationByCityNameEmptyResult(): void
    {
        Http::shouldReceive('withQueryParameters')
            ->with([
                'q' => 'waeasd',
                'limit' => 4,
                'appid' => 'apikey',
            ])
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('get')
            ->with('https://api.openweathermap.org/geo/1.0/direct')
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('object')
            ->once()
            ->andReturn([]);

        $response = Http::withQueryParameters([
                'q' => 'waeasd',
                'limit' => 4,
                'appid' => 'apikey',
            ]
        )->get('https://api.openweathermap.org/geo/1.0/direct')
         ->object();

        $this->mock(WeatherApiService::class, function (MockInterface $mock) use ($response) {
            $mock->shouldReceive('getLocationByCityName')
                ->once()
                ->with('waeasd')
                ->andReturn($response);
        });

        $weatherService = app(WeatherApiService::class);
        $result = $weatherService->getLocationByCityName('waeasd');

        $this->assertEquals([], $result);

    }

    public function testGetWeatherByCoordinates(): void
    {
        $expected = $this->weatherApiFixtures->getFixture('GetWeatherByCoordinates');

        Http::shouldReceive('acceptJson')
            ->once()
            ->andReturnSelf();

        Http::shouldReceive('get')
            ->with('https://api.openweathermap.org/data/2.5/weather',
                [
                    'lat' => 56.1307,
                    'lon' => 47.245,
                    'appid' => 'apikey',
                    'units' => 'metrics',
                ]
            )->andReturnSelf();

        Http::shouldReceive('object')
            ->once()
            ->andReturn($expected);

        $response = Http::acceptJson()->get('https://api.openweathermap.org/data/2.5/weather',
            [
                'lat' => 56.1307,
                'lon' => 47.245,
                'appid' => 'apikey',
                'units' => 'metrics',
            ])->object();

        $this->mock(WeatherApiService::class, function (MockInterface $mock) use ($response) {
            $mock->shouldReceive('getWeatherByCoordinates')
                ->once()
                ->with(56.1307, 47.245)
                ->andReturn($response);
        });

        $weatherService = app(WeatherApiService::class);
        $result = $weatherService->getWeatherByCoordinates(56.1307, 47.245);

        $this->assertEquals($expected, $result);
    }

    public function testGetForecastWeatherByCoordinates(): void
    {
        $expected = $this->weatherApiFixtures->getFixture('GetForecastWeatherByCoordinates');

        Http::shouldReceive('withQueryParameters')
            ->once()
            ->with([
                    'lat' => "56.1307",
                    'lon' => "47.245",
                    'appid' => "apikey",
                    'units' => 'metrics',
                    'cnt' => 4
                ]
            )->andReturnSelf();

        Http::shouldReceive('get')
            ->once()
            ->with('https://api.openweathermap.org/data/2.5/forecast')
            ->andReturnSelf();

        Http::shouldReceive('object')
            ->once()
            ->andReturn($expected);

        $response = Http::withQueryParameters([
                'lat' => "56.1307",
                'lon' => "47.245",
                'appid' => "apikey",
                'units' => 'metrics',
                'cnt' => 4
            ])
            ->get('https://api.openweathermap.org/data/2.5/forecast')
            ->object();

        $this->mock(WeatherApiService::class, function (MockInterface $mock) use ($response) {
            $mock->shouldReceive('getForecastWeatherByCoordinates')
                ->once()
                ->with('56.1307', '47.245')
                ->andReturn($response);
        });

        $weatherService = app(WeatherApiService::class);
        $result = $weatherService->getForecastWeatherByCoordinates('56.1307', '47.245');

        $this->assertEquals($expected, $result);
    }
}
