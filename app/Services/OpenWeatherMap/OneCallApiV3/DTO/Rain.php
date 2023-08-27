<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Rain extends DTO
{
    public function __construct(public readonly float $oneHour)
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['oneHour']
        );
    }
}
