<?php

namespace App\Http\Api\V1\Auth;

use App\Http\Api\ApiController;
use Illuminate\Http\JsonResponse;

class LogoutController extends ApiController
{
    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'You have been successfully logout'
        ]);
    }
}
