<?php

namespace App\Http\Resources\Api\V1\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'dt' => $this->dt,
            'sunrise' => $this->sunrise,
            'sunset' => $this->sunset,
            'moonrise' => $this->moonrise,
            'moonset' => $this->moonset,
            'moonPhase' => $this->moonPhase,
            'summary' => $this->summary,
            'temp' => $this->temp,
            'feelsLike' => $this->feelsLike,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'dewPoint' => $this->dewPoint,
            'windSpeed' => $this->windSpeed,
            'windDeg' => $this->windDeg,
            'weather' => $this->weather,
            'clouds' => $this->clouds,
            'pop' => $this->pop,
            'rain' => $this->rain,
            'uvi' => $this->uvi,
        ];
    }
}
