<?php

namespace App\Http\Resources\Api\V1\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrentWeatherResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'lat' => $this->lat,
            'lon' => $this->lon,
            'timezone' => $this->timezone,
            'timezoneOffset' => $this->timezoneOffset,
            'dt' => $this->current->dt,
            'temp' => $this->current->temp,
            'pressure' => $this->current->pressure,
            'humidity' => $this->current->humidity,
            'clouds' => $this->current->clouds,
            'windSpeed' => $this->current->windSpeed,
            'windDeg' => $this->current->windDeg,
        ];
    }
}
