<?php

namespace App\Http\Resources;

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
            'current' => $this->current,
            $this->mergeWhen($this->minutely, $this->minutely),
            $this->mergeWhen($this->hourly, $this->hourly),
            $this->mergeWhen($this->daily, $this->daily),
            $this->mergeWhen($this->alerts, $this->alerts),
        ];
    }
}
