<?php

declare(strict_types=1);

namespace App\DTO;

class ForecastDTO
{
    public readonly float $latitude;
    public readonly float $longitude;

    public function __construct(array $data)
    {
        $this->latitude = (float) $data['latitude'];
        $this->longitude = (float) $data['longitude'];
    }
}
