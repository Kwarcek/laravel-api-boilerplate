<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Current extends DTO
{
    public function __construct(
        public readonly int $dt,
        public readonly int $sunrise,
        public readonly int $sunset,
        public readonly float $temp,
        public readonly float $feelsLike,
        public readonly int $pressure,
        public readonly int $humidity,
        public readonly float $dewPoint,
        public readonly float $uvi,
        public readonly int $clouds,
        public readonly int $visibility,
        public readonly float $windSpeed,
        public readonly int $windDeg,
        public readonly array $weather
    ) {
    }

    public static function fromArray(array $data): Current
    {
        return new self(
            $data['dt'],
            $data['sunrise'],
            $data['sunset'],
            $data['temp'],
            $data['feels_like'],
            $data['pressure'],
            $data['humidity'],
            $data['dew_point'],
            $data['uvi'],
            $data['clouds'],
            $data['visibility'],
            $data['wind_speed'],
            $data['wind_deg'],
            array_map(static function($data) {
                return Weather::fromArray($data);
            }, $data['weather'])
        );
    }
}
