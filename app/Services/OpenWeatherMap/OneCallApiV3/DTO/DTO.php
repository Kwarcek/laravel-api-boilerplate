<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

abstract class DTO
{
    public abstract static function fromArray(array $data): self;
}
