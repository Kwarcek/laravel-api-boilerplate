<?php

namespace App\Http\Api\V1\Auth;

use App\Http\Api\ApiController;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;

class RegisterController extends ApiController
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken('api_v1')->plainTextToken;

        $user->setAttribute('remember_token', $token);

        return new UserResource($user);
    }
}
