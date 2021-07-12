<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class OrderTest extends TestCase
{
    public function testSuccessfulOrder()
    {
        $user = User::factory()->create();

        $userData = [
            "product_id"=> 1,
            "quantity"=> 15
        ];

        $this->actingAs($user)->json('POST', 'api/order', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    "message"
                ]
            );
    }

    public function testNoAvailableStocksOrder()
    {
        $user = User::factory()->create();

        $userData = [
            "product_id"=> 2,
            "quantity"=> 15
        ];

        $this->actingAs($user)->json('POST', 'api/order', $userData, ['Accept' => 'application/json'])
            ->assertStatus(400);
    }
}
