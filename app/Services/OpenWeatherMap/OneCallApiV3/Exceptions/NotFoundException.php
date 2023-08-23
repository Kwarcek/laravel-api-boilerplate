<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Exceptions;

use Illuminate\Http\Response;

class NotFoundException extends \Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_NOT_FOUND, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
