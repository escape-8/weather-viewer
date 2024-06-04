<?php

declare(strict_types=1);

namespace App\DTO;

class UserLocationDTO
{
    public readonly int $userId;
    public readonly int $locationId;

    public function __construct(int $userId, int $locationId)
    {
        $this->userId = $userId;
        $this->locationId = $locationId;
    }
}
