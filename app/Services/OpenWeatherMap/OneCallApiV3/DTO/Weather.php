<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Weather extends DTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $main,
        public readonly string $description,
        public readonly string $icon
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['main'],
            $data['description'],
            $data['icon']
        );
    }
}
