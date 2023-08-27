<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Minutely extends DTO
{
    public function __construct(public readonly int $dt, public readonly int $precipitation)
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['dt'],
            $data['precipitation']
        );
    }
}
