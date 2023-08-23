<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Enums;

enum Unit: string
{
    case STANDARD = 'standard';
    case METRIC = 'metric';
    case IMPERIAL = 'imperial';
}
