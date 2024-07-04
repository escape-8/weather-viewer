<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\UserLocationDTO;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;

class UserLocationRepository
{
    public function add(UserLocationDTO $userLocationDTO): void
    {
        UserLocation::query()->create([
            'user_id' => $userLocationDTO->userId,
            'location_id' => $userLocationDTO->locationId
        ]);
    }

    public function getTotalCountUserLocations(Authenticatable $user): int
    {
        /** @var User $user **/
        return $user->locations()->count();
    }

    public function getCoordinateLocationsByUser(Authenticatable $user): LengthAwarePaginator
    {
        /** @var User $user **/
        return $user->locations()->paginate(4, ['name', 'latitude', 'longitude']);
    }

    public function checkIfUserHasLocation(UserLocationDTO $userLocationDTO): void
    {
        UserLocation::query()
            ->where('user_id', '=', $userLocationDTO->userId)
            ->where('location_id', '=', $userLocationDTO->locationId)
            ->firstOrFail();
    }

    public function delete(UserLocationDTO $userLocationDTO): void
    {
        UserLocation::query()
            ->where('user_id', '=', $userLocationDTO->userId)
            ->where('location_id', '=', $userLocationDTO->locationId)
            ->delete();
    }
}
