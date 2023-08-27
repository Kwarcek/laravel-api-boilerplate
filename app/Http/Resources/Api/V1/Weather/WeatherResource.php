<?php

namespace App\Http\Resources\Api\V1\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'lat' => $this->lat,
            'lon' => $this->lon,
            'timezone' => $this->timezone,
            'timezoneOffset' => $this->timezoneOffset,
            $this->mergeWhen($this->current, new CurrentResource($this->current)),
            $this->mergeWhen($this->minutely, MinutelyResource::collection($this->minutely)),
            $this->mergeWhen($this->hourly, HourlyResource::collection($this->hourly)),
            $this->mergeWhen($this->daily, DailyResource::collection($this->daily)),
            $this->mergeWhen($this->alerts, AlertResource::collection($this->alerts)),
        ];
    }
}
