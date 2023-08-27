<?php

namespace Api\V1\Auth;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Illuminate\Auth\AuthenticationException;

class LogoutControllerTest extends TestCase
{
    public function test_logout_controller_auth(): void
    {
        $this->expectException(AuthenticationException::class);

        $response = $this->post('/api/v1/auth/logout');
        $response->json();
    }

    public function test_logout_controller_valid_logout(): void
    {
        Sanctum::actingAs(User::factory()->make());

        $response = $this->post('/api/v1/auth/logout');

        $responseArray = $response->json();

        $response->assertOk();
        $this->assertIsArray($responseArray);
        $this->assertArrayHasKey('message', $responseArray);


    }
}
