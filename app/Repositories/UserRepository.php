<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\CreateUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function addUser(CreateUserDTO $data): User
    {
        $user = new User();
        $user->fill([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
        $user->save();
        return $user;
    }
}
