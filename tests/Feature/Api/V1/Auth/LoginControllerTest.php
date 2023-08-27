<?php

namespace Api\V1\Auth;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\UnauthorizedException;

class LoginControllerTest extends TestCase
{
    public function test_login_controller_auth(): void
    {
        $this->expectException(UnauthorizedException::class);

        $query = http_build_query([
            'email' => fake()->email(),
            'password' => fake()->password()
        ]);

        $response = $this->post("/api/v1/auth/login?$query");
        $response->json();
    }

    public function test_login_controller_validation(): void
    {
        $this->expectException(ValidationException::class);

        $response = $this->post("/api/v1/auth/login");
        $response->json();
    }

    public function test_login_controller_valid_login(): void
    {
        $user = User::factory()->create();

        $response = $this->post("/api/v1/auth/login", [
            'email' => $user->email,
            'password' => UserFactory::DEFAULT_PASSWORD
        ]);

        $response->json();
        $response->assertOk();
    }
}
