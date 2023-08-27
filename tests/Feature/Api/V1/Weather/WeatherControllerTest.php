<?php

namespace Tests\Feature\Api\V1\Weather;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Illuminate\Auth\AuthenticationException;

class WeatherControllerTest extends TestCase
{
    public function test_weather_controller_index_auth(): void
    {
        $this->expectException(AuthenticationException::class);

        $response = $this->get('/api/v1/weather');
        $response->json();
    }

    public function test_weather_controller_current_auth(): void
    {
        $this->expectException(AuthenticationException::class);

        $response = $this->get('/api/v1/weather/current');
        $response->json();
    }

    public function test_weather_controller_index_validation_response(): void
    {
        Sanctum::actingAs(User::factory()->make());

        $this->expectException(ValidationException::class);

        $response = $this->get("/api/v1/weather");
        $response->json();
    }

    public function test_weather_controller_index_response(): void
    {
        Sanctum::actingAs(User::factory()->make());

        $query = http_build_query([
            'latitude' => 50,
            'longitude' => 50,
        ]);

        $response = $this->get("/api/v1/weather?$query");
        $response->json();

        $response->assertOk();
    }

    public function test_weather_controller_current_validation_response(): void
    {
        Sanctum::actingAs(User::factory()->make());

        $this->expectException(ValidationException::class);

        $response = $this->get("/api/v1/weather/current");
        $response->json();
    }

    public function test_weather_controller_current_response(): void
    {
        Sanctum::actingAs(User::factory()->make());

        $query = http_build_query([
            'latitude' => 50,
            'longitude' => 50,
        ]);

        $response = $this->get("/api/v1/weather/current?$query");

        $response->assertOk();
    }
}
