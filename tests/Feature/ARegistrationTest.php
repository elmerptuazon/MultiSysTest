<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ARegistrationTest extends TestCase
{

    public function testSuccessfulRegistration()
    {
        $userData = [
            "name" => "Sample",
            "email" => "sample@example.com",
            "password" => "Password_123",
            "password_confirmation" => "Password_123"
        ];

        $this->json('POST', 'api/auth/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    "message"
                ]
            );
    }

    public function testRepeatedEmailRegistration()
    {
        $userData = [
            "name" => "Sample",
            "email" => "sample@example.com",
            "password" => "Password_123",
            "password_confirmation" => "Password_123"
        ];

        $this->json('POST', 'api/auth/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonStructure(
                [
                    "message",
                    "errors"=> [
                        "email"
                    ]
                ]
            );
    }
}
