<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Daily extends DTO
{
    public function __construct(
        public readonly int $dt,
        public readonly int $sunrise,
        public readonly int $sunset,
        public readonly int $moonrise,
        public readonly int $moonset,
        public readonly float $moonPhase,
        public readonly string $summary,
        public readonly Temp $temp,
        public readonly FeelsLike $feelsLike,
        public readonly int $pressure,
        public readonly int $humidity,
        public readonly float $dewPoint,
        public readonly float $windSpeed,
        public readonly int $windDeg,
        public readonly float $windGust,
        public readonly array $weather,
        public readonly int $clouds,
        public readonly int|float $pop,
        public readonly ?float $rain,
        public readonly float|int $uvi
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['dt'],
            $data['sunrise'],
            $data['sunset'],
            $data['moonrise'],
            $data['moonset'],
            $data['moon_phase'],
            $data['summary'],
            Temp::fromArray($data['temp']),
            FeelsLike::fromArray($data['feels_like']),
            $data['pressure'],
            $data['humidity'],
            $data['dew_point'],
            $data['wind_speed'],
            $data['wind_deg'],
            $data['wind_gust'],
            array_map(static function($data) {
                return Weather::fromArray($data);
            }, $data['weather']),
            $data['clouds'],
            $data['pop'],
            $data['rain'] ?? null,
            $data['uvi']
        );
    }
}
