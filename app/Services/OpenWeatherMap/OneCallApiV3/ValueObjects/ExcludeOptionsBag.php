<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\ValueObjects;

use App\Services\OpenWeatherMap\OneCallApiV3\Enums\ExcludeOption;

class ExcludeOptionsBag extends ValueObject
{
    public const DEFAULT_STRING_SEPARATOR = ',';
    private array $value = [];

    public function getValue(): array
    {
        return $this->value;
    }

    public function toString(string $separator = self::DEFAULT_STRING_SEPARATOR): string
    {
        return collect($this->value)->pluck('value')->implode($separator);
    }

    public function addValue(ExcludeOption $excludeOption): void
    {
        $this->value[] = $excludeOption;
    }

    public function clearValue(): void
    {
        $this->value = [];
    }
}
