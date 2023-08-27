<?php

namespace App\Http\Api\V1\User;

use App\Http\Api\ApiController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;

class UserController extends ApiController
{
    /**
     * @throws UnauthorizedException
     */
    public function close(User $user, Request $request): JsonResponse
    {
        if($user->id !== $request->user()->id) {
            throw new UnauthorizedException('', Response::HTTP_UNAUTHORIZED);
        }

        $user->update(['closed' => true]);

        $user->tokens()->delete();

        return response()->json([
            'message' => __('user.close')
        ]);
    }
}
