<?php

namespace App\Http\Api\V1\Auth;

use App\Http\Api\ApiController;
use app\Http\Requests\Api\V1\Auth\LoginRequest;
use app\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Validation\UnauthorizedException;

class LoginController extends ApiController
{
    /**
     * @param LoginRequest $request
     * @return UserResource
     * @throws UnauthorizedException
     */
    public function login(LoginRequest $request): UserResource
    {
        $user = User::query()
            ->where('email', $request->input('email'))
            ->first();

        return new UserResource($user);
    }
}
