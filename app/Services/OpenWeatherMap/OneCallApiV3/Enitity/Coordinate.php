<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Enitity;

class Coordinate extends Entity
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
    )
    {
    }
}
