<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function create(Request $request): Response
    {
        return response()->view('auth.reset-password', ['request' => $request]);
    }

    public function store(ResetPasswordRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $status = Password::reset(
            $credentials,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('user.login')->with('status', trans($status))
            : back()->withErrors(['email' => [trans($status)]]);
    }
}
