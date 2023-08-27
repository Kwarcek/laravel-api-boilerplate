<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Enums;

use App\Enums\EnumToArray;

enum ExcludeOption: string
{
    use EnumToArray;

    case CURRENT = 'current';
    case MINUTELY = 'minutely';
    case HOURLY = 'hourly';
    case DAILY = 'daily';
    case ALERTS = 'alerts';
}
