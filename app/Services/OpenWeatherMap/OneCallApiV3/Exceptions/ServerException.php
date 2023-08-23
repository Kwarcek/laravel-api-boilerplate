<?php

namespace App\Services\OpenWeatherMap\OneCallApiV3\Exceptions;

use Illuminate\Http\Response;

class ServerException extends \Exception
{
    public function __construct(string $message = "", int $code = Response::HTTP_INTERNAL_SERVER_ERROR, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
