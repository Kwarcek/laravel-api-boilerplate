<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class FeelsLike extends DTO
{
    public function __construct(
        public readonly float $day,
        public readonly float $night,
        public readonly float $eve,
        public readonly float $morn
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['day'],
            $data['night'],
            $data['eve'],
            $data['morn']
        );
    }
}
