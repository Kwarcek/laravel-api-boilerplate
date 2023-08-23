<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3;

class ApiKey
{
    public function __construct(public readonly string $value)
    {
    }
}
