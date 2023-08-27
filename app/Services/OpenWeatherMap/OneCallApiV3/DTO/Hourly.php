<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Hourly extends DTO
{
    public function __construct(
        public readonly int $dt,
        public readonly float $temp,
        public readonly float|int $feelsLike,
        public readonly int $pressure,
        public readonly int $humidity,
        public readonly float $dewPoint,
        public readonly float|int $uvi,
        public readonly int $clouds,
        public readonly int $visibility,
        public readonly float|int $windSpeed,
        public readonly int $windDeg,
        public readonly float $windGust,
        public readonly array $weather,
        public readonly float|int $pop,
        public readonly ?Rain $rain
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['dt'],
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
            $data['wind_gust'],
            array_map(static function($data) {
                return Weather::fromArray($data);
            }, $data['weather']),
            $data['pop'],
            ($data['rain'] ?? null) !== null ? Rain::fromArray($data['rain']) : null
        );
    }
}
