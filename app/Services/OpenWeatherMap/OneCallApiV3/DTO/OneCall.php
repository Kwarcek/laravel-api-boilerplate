<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class OneCall extends DTO
{

    public function __construct(
        public readonly float $lat,
        public readonly float $lon,
        public readonly string $timezone,
        public readonly int $timezoneOffset,
        public readonly Current $current,
        public readonly array $minutely,
        public readonly array $hourly,
        public readonly array $daily,
        public readonly array $alerts
    ) {
    }

    public static function fromArray(array $data): OneCall
    {
        return new self(
            $data['lat'],
            $data['lon'],
            $data['timezone'],
            $data['timezone_offset'],
            Current::fromArray($data['current']),
            array_map(static function($data) {
                return Minutely::fromArray($data);
            }, $data['minutely'] ?? []),
            array_map(static function($data) {
                return Hourly::fromArray($data);
            }, $data['hourly'] ?? []),
            array_map(static function($data) {
                return Daily::fromArray($data);
            }, $data['daily'] ?? []),
            array_map(static function($data) {
                return Alerts::fromArray($data);
            }, $data['alerts'] ?? [])
        );
    }
}
