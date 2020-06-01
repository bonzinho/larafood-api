<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A Error to create new Client
     *
     * @return void
     */
    public function testErrorCreateNewClient()
    {


        $payload = [
            'name' => 'Vitor Client',
            'email' => 'testEmail@client.pt',
            //'password' => 'secret',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(422);

        /*->assertExactJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'password' => [
                    trans('validation.required', ['attribute' => 'password'])
                ]
            ]
        ]);*/
    }

    /**
     * create new Client
     *
     * @return void
     */
    public function testSuccessCreateNewClient()
    {
        $payload = [
            'name' => 'Vitor Client',
            'email' => 'testEmail@client.pt',
            'password' => 'secret',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(201)
        ->assertExactJson([
            'data' => [
                'name' => $payload['name'],
                'email' => $payload['email'],
            ]
        ]);
    }
}
