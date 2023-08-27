<?php

namespace Api\V1\Auth;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    public function test_register_controller_validation(): void
    {
        $this->expectException(ValidationException::class);

        $response = $this->post('/api/v1/auth/register');
        $response->json();
    }

    public function test_register_controller_register_successfully(): void
    {
        $user = User::factory()->make();

        $response = $this->post('/api/v1/auth/register', [
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->firstname,
            'password' => $user->password,
            'password_confirmation' => $user->password,
        ]);

        $responseArray = $response->json();

        $response->assertOk();
        $this->assertIsArray($responseArray);
        $this->assertArrayHasKey('data', $responseArray);
    }
}
