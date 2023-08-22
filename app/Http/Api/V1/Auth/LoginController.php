<?php

namespace App\Http\Api\V1\Auth;

use App\Http\Api\ApiController;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Validation\UnauthorizedException;

class LoginController extends ApiController
{
    /** @throws UnauthorizedException */
    public function login(LoginRequest $request): UserResource
    {
        $user = User::query()
            ->where('email', $request->input('email'))
            ->first();

        return new UserResource($user);
    }
}
