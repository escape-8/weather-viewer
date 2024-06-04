<?php

declare(strict_types=1);

namespace App\DTO;

class LocationDTO
{
    public readonly string $name;
    public readonly float $latitude;
    public readonly float $longitude;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->latitude = (float) $data['latitude'];
        $this->longitude = (float) $data['longitude'];
    }
}
