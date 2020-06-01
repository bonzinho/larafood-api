<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Translation;

class AuthTest extends TestCase
{
    /**
     * Error Validation
     *
     * @return void
     */
    public function testValidationAuthError()
    {

        $response = $this->postJson('/api/auth/token');
        $response->assertStatus(422);

    }

    /**
     * Error auth with user fake
     *
     * @return void
     */
    public function testAuthClientFake()
    {
        $payload = [
            'email' => 'fake@adad.com',
            'password' => '1234567',
            'device_name' => 'fake',
        ];

        $response = $this->postJson('api/auth/token', $payload);
        //$response->dump();
        $response->assertStatus(404);



    }
    /**
     * Error auth with user fake
     *
     * @return void
     */
    public function testAuthSuccess()
    {

        $client = factory(Client::class)->create();

        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => 'faker',
        ];

        $response = $this->postJson('api/auth/token', $payload);
        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);



    }

    /**
     * Error get Me
     *
     * @return void
     */
    public function testGetMeError()
    {
        $response = $this->getJson('/api/auth/me');
        $response->assertStatus(401);
    }

    /**
     * get Me
     *
     * @return void
     */
    public function testGetMe()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        $response = $this->getJson('/api/auth/me', ['Authorization' => "Bearer {$token}"]);
        $response->assertStatus(200)
                ->assertExactJson([
                    'data' => [
                        'name' => $client->name,
                        'email' => $client->email,
                    ]
                ]);
    }

    /**
     * Logout
     *
     * @return void
     */
    public function testLogout()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        $response = $this->postJson('/api/auth/logout', [], ['Authorization' => "Bearer {$token}"]);
        $response->assertStatus(204);

    }

}
