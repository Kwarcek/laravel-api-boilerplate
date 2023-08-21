<?php

namespace App\Services\openWeatherMap\OneCallApiv3;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Request
{
    public const API_BASE_URL = 'https://api.openweathermap.org/data/3.0/onecall';

    protected PendingRequest $request;

    public function __construct(array $options = [])
    {
        $this->request = Http::baseUrl(self::API_BASE_URL)->withOptions($options);
    }


    public function get(string $url, array|string|null $query = null): Response
    {
        return $this->request->get($url, $query);
    }
}
