<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        $userData = [
            "email"=> "sample@example.com",
            "password"=> "Password_123"
        ];

        $this->json('POST', 'api/auth/login', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    "message",
                    "data"=> [
                        "access_token"
                    ]
                ]
            );
    }

    public function testFailedLogin()
    {
        $userData = [
            "email"=> "sample@example.com",
            "password"=> "Password_12"
        ];

        $this->json('POST', 'api/auth/login', $userData, ['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJsonStructure(
                [
                    "message",
                    "errors"=> [
                        "account"
                    ]
                ]
            );
    }
}
