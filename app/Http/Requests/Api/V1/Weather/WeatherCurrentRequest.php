<?php

namespace App\Http\Requests\Api\V1\Weather;

use App\Services\OpenWeatherMap\OneCallApiV3\Enums\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class WeatherCurrentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'unit' => ['sometimes', new Enum(Unit::class)],
            'lang' => 'sometimes|string',
        ];
    }
}
