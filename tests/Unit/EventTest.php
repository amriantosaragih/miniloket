<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $data = [
            'name' => $this->faker->sentence(30),
            'ticket_type_id' => $this->faker->sentence(36),
            'location_id' => $this->faker->sentence(36)
        ];

        $this->post('/event/create', $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
}
