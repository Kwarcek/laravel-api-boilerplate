<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Exceptions;

use Illuminate\Http\Response;

class TooManyRequestException extends \Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_TOO_MANY_REQUESTS, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
