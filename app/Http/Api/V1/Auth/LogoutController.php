<?php

namespace App\Http\Api\V1\Auth;

use App\Http\Api\ApiController;

class LogoutController extends ApiController
{
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [];
    }
}
