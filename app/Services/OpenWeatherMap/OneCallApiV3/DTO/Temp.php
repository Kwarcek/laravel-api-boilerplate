<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Temp extends DTO
{
    public function __construct(
        public readonly float|int $day,
        public readonly float $min,
        public readonly float $max,
        public readonly float $night,
        public readonly float $eve,
        public readonly float $morn
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['day'],
            $data['min'],
            $data['max'],
            $data['night'],
            $data['eve'],
            $data['morn']
        );
    }
}
