<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Exceptions;

use Illuminate\Http\Response;

class UnathorizedException extends \Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_UNAUTHORIZED, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
