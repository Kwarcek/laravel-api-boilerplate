<?php

namespace App\Http\Resources\Api\V1\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlertResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'senderName' => $this->senderName,
            'event' => $this->event,
            'start' => $this->start,
            'end' => $this->end,
            'description' => $this->description,
            'tags' => $this->tags,
        ];
    }
}
