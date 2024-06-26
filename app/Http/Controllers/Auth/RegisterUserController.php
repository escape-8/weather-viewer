<?php

namespace App\Http\Controllers\Auth;

use App\DTO\CreateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class RegisterUserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(): Response
    {
        return response()->view('auth.register');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validatedDTO = new CreateUserDTO($request->validated());
        $newUser = $this->userRepository->addUser($validatedDTO);

        event(new Registered($newUser));

        return redirect()->route('login')
            ->with('status', 'User create successfully. Check your email to verify address.');
    }
}
