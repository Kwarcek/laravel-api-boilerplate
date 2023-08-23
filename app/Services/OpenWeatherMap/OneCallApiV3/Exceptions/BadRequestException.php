<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Exceptions;

use Illuminate\Http\Response;

class BadRequestException extends \Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_BAD_REQUEST, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
