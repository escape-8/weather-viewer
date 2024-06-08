<?php

declare(strict_types=1);

namespace Tests\Feature\Fixtures;

class WeatherApiFixtures
{
    public function getFixture(string $testMethod): array|object
    {
        return match ($testMethod) {

            'GetLocationByCityName' => [
                (object)[
                    'name' => "Cheboksary",
                    'local_names' => (object)['en' => "Cheboksary", 'ru' => "Чебоксары"],
                    'lat' => 56.1307195,
                    'lon' => 47.2449597,
                    'country' => "RU",
                    'state' => "Chuvashia",
                ]
            ],

            'GetWeatherByCoordinates' => (object)[
                'coord' => (object)[
                    'lon' => 47.245,
                    'lat' => 56.1307
                ],
                'weather' => [
                    (object)[
                        'id' => 800,
                        'main' => "Clear",
                        'description' => "clear sky",
                        'icon' => "01d"
                    ]
                ],
                'base' => "stations",
                'main' => (object)[
                    'temp' => 22.21,
                    'feels_like' => 22.16,
                    'temp_min' => 22.21,
                    'temp_max' => 22.21,
                    'pressure' => 1004,
                    'humidity' => 64
                ],
                'visibility' => 10000,
                'wind' => (object)[
                    'speed' => 2,
                    'deg' => 270
                ],
                'clouds' => (object)[
                    'all' => 0
                ],
                'dt' => 1717735395,
                'sys' => (object)[
                    'type' => 1,
                    'id' => 9042,
                    'country' => "RU",
                    'sunrise' => 1717718802,
                    'sunset' => 1717781605
                ],
                'timezone' => 10800,
                'id' => 569696,
                'name' => "Cheboksary",
                'cod' => 200
            ],

            'GetForecastWeatherByCoordinates' => (object)[
                'cod' => '200',
                'message' => 0,
                'cnt' => 8,
                'list' =>
                    [
                        (object)[
                            'dt' => 1717740000,
                            'main' =>
                                (object)[
                                    'temp' => 23.21,
                                    'feels_like' => 23.15,
                                    'temp_min' => 22.44,
                                    'temp_max' => 23.21,
                                    'pressure' => 1003,
                                    'sea_level' => 1003,
                                    'grnd_level' => 989,
                                    'humidity' => 60,
                                    'temp_kf' => 0.77,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 800,
                                        'main' => 'Clear',
                                        'description' => 'clear sky',
                                        'icon' => '01d',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 0,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 1.86,
                                    'deg' => 273,
                                    'gust' => 2.2,
                                ],
                            'visibility' => 10000,
                            'pop' => 0,
                            'sys' =>
                                (object)[
                                    'pod' => 'd',
                                ],
                            'dt_txt' => '2024-06-07 06:00:00',
                        ],
                        (object)[
                            'dt' => 1717750800,
                            'main' =>
                                (object)[
                                    'temp' => 23.44,
                                    'feels_like' => 23.43,
                                    'temp_min' => 23.44,
                                    'temp_max' => 23.91,
                                    'pressure' => 1003,
                                    'sea_level' => 1003,
                                    'grnd_level' => 989,
                                    'humidity' => 61,
                                    'temp_kf' => -0.47,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 500,
                                        'main' => 'Rain',
                                        'description' => 'light rain',
                                        'icon' => '10d',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 28,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 1.68,
                                    'deg' => 284,
                                    'gust' => 1.5,
                                ],
                            'visibility' => 10000,
                            'pop' => 1,
                            'rain' =>
                                (object)[
                                    '3h' => 2.07,
                                ],
                            'sys' =>
                                (object)[
                                    'pod' => 'd',
                                ],
                            'dt_txt' => '2024-06-07 09:00:00',
                        ],
                        (object)[
                            'dt' => 1717761600,
                            'main' =>
                                (object)[
                                    'temp' => 25.08,
                                    'feels_like' => 25.03,
                                    'temp_min' => 25.08,
                                    'temp_max' => 26.02,
                                    'pressure' => 1002,
                                    'sea_level' => 1002,
                                    'grnd_level' => 988,
                                    'humidity' => 53,
                                    'temp_kf' => -0.94,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 500,
                                        'main' => 'Rain',
                                        'description' => 'light rain',
                                        'icon' => '10d',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 49,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 1.61,
                                    'deg' => 300,
                                    'gust' => 1.71,
                                ],
                            'visibility' => 10000,
                            'pop' => 1,
                            'rain' =>
                                (object)[
                                    '3h' => 0.72,
                                ],
                            'sys' =>
                                (object)[
                                    'pod' => 'd',
                                ],
                            'dt_txt' => '2024-06-07 12:00:00',
                        ],
                        (object)[
                            'dt' => 1717772400,
                            'main' =>
                                (object)[
                                    'temp' => 20.69,
                                    'feels_like' => 21.03,
                                    'temp_min' => 20.69,
                                    'temp_max' => 20.69,
                                    'pressure' => 1002,
                                    'sea_level' => 1002,
                                    'grnd_level' => 988,
                                    'humidity' => 85,
                                    'temp_kf' => 0,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 500,
                                        'main' => 'Rain',
                                        'description' => 'light rain',
                                        'icon' => '10d',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 72,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 3.66,
                                    'deg' => 31,
                                    'gust' => 6.51,
                                ],
                            'visibility' => 10000,
                            'pop' => 1,
                            'rain' =>
                                (object)[
                                    '3h' => 1.92,
                                ],
                            'sys' =>
                                (object)[
                                    'pod' => 'd',
                                ],
                            'dt_txt' => '2024-06-07 15:00:00',
                        ],
                        (object)[
                            'dt' => 1717783200,
                            'main' =>
                                (object)[
                                    'temp' => 17.23,
                                    'feels_like' => 17.52,
                                    'temp_min' => 17.23,
                                    'temp_max' => 17.23,
                                    'pressure' => 1003,
                                    'sea_level' => 1003,
                                    'grnd_level' => 989,
                                    'humidity' => 96,
                                    'temp_kf' => 0,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 500,
                                        'main' => 'Rain',
                                        'description' => 'light rain',
                                        'icon' => '10n',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 86,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 4.36,
                                    'deg' => 35,
                                    'gust' => 9.49,
                                ],
                            'visibility' => 10000,
                            'pop' => 1,
                            'rain' =>
                                (object)[
                                    '3h' => 2.08,
                                ],
                            'sys' =>
                                (object)[
                                    'pod' => 'n',
                                ],
                            'dt_txt' => '2024-06-07 18:00:00',
                        ],
                        (object)[
                            'dt' => 1717794000,
                            'main' =>
                                (object)[
                                    'temp' => 15,
                                    'feels_like' => 15.09,
                                    'temp_min' => 15,
                                    'temp_max' => 15,
                                    'pressure' => 1004,
                                    'sea_level' => 1004,
                                    'grnd_level' => 990,
                                    'humidity' => 97,
                                    'temp_kf' => 0,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 500,
                                        'main' => 'Rain',
                                        'description' => 'light rain',
                                        'icon' => '10n',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 100,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 3.31,
                                    'deg' => 24,
                                    'gust' => 8.18,
                                ],
                            'visibility' => 10000,
                            'pop' => 1,
                            'rain' =>
                                (object)[
                                    '3h' => 2.16,
                                ],
                            'sys' =>
                                (object)[
                                    'pod' => 'n',
                                ],
                            'dt_txt' => '2024-06-07 21:00:00',
                        ],
                        (object)[
                            'dt' => 1717804800,
                            'main' =>
                                (object)[
                                    'temp' => 13.87,
                                    'feels_like' => 13.85,
                                    'temp_min' => 13.87,
                                    'temp_max' => 13.87,
                                    'pressure' => 1004,
                                    'sea_level' => 1004,
                                    'grnd_level' => 990,
                                    'humidity' => 97,
                                    'temp_kf' => 0,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 804,
                                        'main' => 'Clouds',
                                        'description' => 'overcast clouds',
                                        'icon' => '04n',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 100,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 2.94,
                                    'deg' => 26,
                                    'gust' => 8.4,
                                ],
                            'visibility' => 10000,
                            'pop' => 0.8,
                            'sys' =>
                                (object)[
                                    'pod' => 'n',
                                ],
                            'dt_txt' => '2024-06-08 00:00:00',
                        ],
                        (object)[
                            'dt' => 1717815600,
                            'main' =>
                                (object)[
                                    'temp' => 15.29,
                                    'feels_like' => 15.33,
                                    'temp_min' => 15.29,
                                    'temp_max' => 15.29,
                                    'pressure' => 1005,
                                    'sea_level' => 1005,
                                    'grnd_level' => 991,
                                    'humidity' => 94,
                                    'temp_kf' => 0,
                                ],
                            'weather' =>
                                [
                                    (object)[
                                        'id' => 804,
                                        'main' => 'Clouds',
                                        'description' => 'overcast clouds',
                                        'icon' => '04d',
                                    ],
                                ],
                            'clouds' =>
                                (object)[
                                    'all' => 97,
                                ],
                            'wind' =>
                                (object)[
                                    'speed' => 3.09,
                                    'deg' => 354,
                                    'gust' => 6.81,
                                ],
                            'visibility' => 10000,
                            'pop' => 0,
                            'sys' =>
                                (object)[
                                    'pod' => 'd',
                                ],
                            'dt_txt' => '2024-06-08 03:00:00',
                        ],
                    ],
                'city' =>
                    (object)[
                        'id' => 569696,
                        'name' => 'Cheboksary',
                        'coord' =>
                            (object)[
                                'lat' => 56.1307,
                                'lon' => 47.245,
                            ],
                        'country' => 'RU',
                        'population' => 446781,
                        'timezone' => 10800,
                        'sunrise' => 1717718802,
                        'sunset' => 1717781605,
                    ],
            ]
        };
    }
}
