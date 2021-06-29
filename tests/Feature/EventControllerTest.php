<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\BaseTestCase;

class EventControllerTest extends BaseTestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @test
     */
    public function test_create_event()
    {
        $data = [
            'name' => 'First event',
            'address' => $this->faker->address,
        ];
        $response = $this->post('/api/v1/events',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function test_create_event_validation()
    {
        $data = [];
        $response = $this->post('/api/v1/events',$data);

        $response->assertStatus(422);
    }
}
