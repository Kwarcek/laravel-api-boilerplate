<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3;

use App\Services\OpenWeatherMap\OneCallApiV3\DTO\OneCall;
use App\Services\OpenWeatherMap\OneCallApiV3\Enitity\Coordinate;
use App\Services\OpenWeatherMap\OneCallApiV3\Enums\ExcludeOption;
use App\Services\OpenWeatherMap\OneCallApiV3\Enums\Unit;
use App\Services\OpenWeatherMap\OneCallApiV3\Exceptions\BadRequestException;
use App\Services\OpenWeatherMap\OneCallApiV3\Exceptions\NotFoundException;
use App\Services\OpenWeatherMap\OneCallApiV3\Exceptions\ServerException;
use App\Services\OpenWeatherMap\OneCallApiV3\Exceptions\TooManyRequestException;
use App\Services\OpenWeatherMap\OneCallApiV3\Exceptions\UnathorizedException;
use App\Services\OpenWeatherMap\OneCallApiV3\ValueObjects\ExcludeOptionsBag;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class Request
{
    public const API_BASE_URL = 'https://api.openweathermap.org/data/3.0';

    protected PendingRequest $request;

    public function __construct(
        protected ApiKey $apiKey,
        array            $options = []
    )
    {
        $this->request = Http::baseUrl(self::API_BASE_URL)->withOptions($options);
    }

    /**
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws ServerException
     * @throws TooManyRequestException
     * @throws UnathorizedException
     */
    public function getCurrentAndForecastsWeatherData(
        Coordinate                           $coordinate,
        ExcludeOption|ExcludeOptionsBag|null $excludeOptions = null,
        ?Unit                                $unit = null,
        ?string                              $lang = null
    ): OneCall
    {
        if ($excludeOptions instanceof ExcludeOptionsBag) {
            $excludeOptions = $excludeOptions->toString();
        }

        if ($excludeOptions instanceof ExcludeOption) {
            $excludeOptions = $excludeOptions->value;
        }

        $query = http_build_query([
            'lat' => $coordinate->latitude,
            'lon' => $coordinate->longitude,
            'exclude' => $excludeOptions,
            'appId' => $this->apiKey->value,
            'units' => $unit ?: Unit::STANDARD->value,
            'lang' => $lang,
        ]);

        $response = $this->request->get(
            '/onecall',
            $query
        );

        $this->processPotentiallyExceptions($response);

        return OneCall::fromArray($response->json());
    }

    /**
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws ServerException
     * @throws TooManyRequestException
     * @throws UnathorizedException
     */
    protected function processPotentiallyExceptions(ClientResponse $response): void
    {
        if (!$response->failed()) {
            return;
        }

        $message = $response->json()['message'] ?? '';

        match ($response->status()) {
            Response::HTTP_BAD_REQUEST => throw new BadRequestException($message),
            Response::HTTP_UNAUTHORIZED => throw new UnathorizedException($message),
            Response::HTTP_NOT_FOUND => throw new NotFoundException($message),
            Response::HTTP_TOO_MANY_REQUESTS => throw new TooManyRequestException($message),
            default => throw new ServerException($message, $response->status())
        };
    }
}
