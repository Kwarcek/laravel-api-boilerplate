<?php

namespace App\Http\Resources\Api\V1\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MinutelyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'dt' => $this->dt,
            'precipitation' => $this->precipitation,
        ];
    }
}
