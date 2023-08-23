<?php

namespace App\Http\Api\V1\User;

use App\Http\Api\ApiController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function close(User $user, Request $request): JsonResponse
    {
        if($user->id !== $request->user()->id) { // todo
            throw new \Exception();
        }

        $user->update(['closed' => true]);

        $user->tokens()->delete();

        return response()->json([
            'message' => 'You have been closed successfully'
        ]);
    }
}
