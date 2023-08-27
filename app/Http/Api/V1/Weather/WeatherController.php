<?php

namespace App\Http\Api\V1\Weather;

use App\Http\Api\ApiController;
use App\Http\Requests\Api\V1\Weather\WeatherCurrentRequest;
use App\Http\Requests\Api\V1\Weather\WeatherIndexRequest;
use App\Http\Resources\WeatherResource;
use App\Services\OpenWeatherMap\OneCallApiV3\Enitity\Coordinate;
use App\Services\OpenWeatherMap\OneCallApiV3\Enums\ExcludeOption;
use App\Services\OpenWeatherMap\OneCallApiV3\Enums\Unit;
use App\Services\OpenWeatherMap\OneCallApiV3\Request;
use App\Services\OpenWeatherMap\OneCallApiV3\ValueObjects\ExcludeOptionsBag;

class WeatherController extends ApiController
{
    public function index(WeatherIndexRequest $request, Request $apiRequest): WeatherResource
    {
        $coordinate = new Coordinate($request->latitude, $request->longitude);

        $response = $apiRequest->getCurrentAndForecastsWeatherData(
            coordinate: $coordinate,
            unit: $request->unit ? Unit::from($request->unit) : null,
            lang: $request->lang
        );


        return new WeatherResource($response);
    }

    public function current(WeatherCurrentRequest $request, Request $apiRequest): WeatherResource
    {
        $coordinate = new Coordinate($request->latitude, $request->longitude);

        $excludeOptionsBag = new ExcludeOptionsBag();

        collect(ExcludeOption::cases())
            ->filter(fn(ExcludeOption $excludeOption) => $excludeOption !== ExcludeOption::CURRENT)
            ->each(fn(ExcludeOption $excludeOption) => $excludeOptionsBag->addValue($excludeOption));

        $response = $apiRequest->getCurrentAndForecastsWeatherData(
            coordinate: $coordinate,
            excludeOptions: $excludeOptionsBag,
            unit: $request->unit ? Unit::from($request->unit) : null,
            lang: $request->lang
        );

        return new WeatherResource($response);
    }
}
