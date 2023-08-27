<?php

namespace App\Http\Resources\Api\V1\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HourlyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'dt' => $this->dt,
            'temp' => $this->temp,
            'feelsLike' => $this->feelsLike,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'dewPoint' => $this->dewPoint,
            'uvi' => $this->uvi,
            'clouds' => $this->clouds,
            'visibility' => $this->visibility,
            'windSpeed' => $this->windSpeed,
            'windDeg' => $this->windDeg,
            'windGust' => $this->windGust,
            'weather' => $this->weather,
            'pop' => $this->pop,
            'rain' => $this->rain,
        ];
    }
}
