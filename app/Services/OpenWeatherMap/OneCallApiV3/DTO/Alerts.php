<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\DTO;

class Alerts extends DTO
{
    public function __construct(
        public readonly string $senderName,
        public readonly string $event,
        public readonly int $start,
        public readonly int $end,
        public readonly string $description,
        public readonly array $tags
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['sender_name'],
            $data['event'],
            $data['start'],
            $data['end'],
            $data['description'],
            $data['tags']
        );
    }
}
