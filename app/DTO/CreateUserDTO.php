<?php

declare(strict_types=1);

namespace App\DTO;

class CreateUserDTO
{
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }
}
