<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\LocationDTO;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;

class LocationRepository
{
    public function add(LocationDTO $locationDTO): int
    {
        $location = Location::query()->firstOrCreate(
            [
                'name' => $locationDTO->name,
                'latitude' => round($locationDTO->latitude, 7),
                'longitude' => round($locationDTO->longitude, 7),
            ],
        );
        return $location->getAttribute('id');
    }

    public function getById(int $id): Model
    {
        return Location::query()->find($id, ['name', 'latitude', 'longitude']);
    }
}
