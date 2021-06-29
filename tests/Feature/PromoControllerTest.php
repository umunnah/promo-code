<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Promo;
use Tests\BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PromoControllerTest extends BaseTestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @test
     */
    public function test_create_promo()
    {
        $event = Event::factory()->create();
        $data = [
            'code' => $this->faker->bankAccountNumber,
            'radius' => $this->faker->numberBetween(2,500),
            'amount' => 5.00,
            'status' => $this->faker->numberBetween(0,1),
            'event_id' => $event->id,
        ];
        $response = $this->post('/api/v1/promos',$data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function test_create_promo_validation()
    {
        $data = [];
        $response = $this->post('/api/v1/promos',$data);

        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function test_get_all_promo_codes()
    {
        Promo::factory(20)->create();
        $response = $this->get('/api/v1/promo-codes');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_get_all_promo_codes_with_specified_pagination()
    {
        Promo::factory(20)->create();
        $response = $this->get('/api/v1/promo-codes?paginate=20');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_get_active_promo_codes()
    {
        Promo::factory(20)->create();
        $response = $this->get('/api/v1/promo-codes?paginate=20&status=1');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_deactivate_promo_code()
    {
        $promo = Promo::factory(['status' => 1])->create();
        $response = $this->patch('/api/v1/promo/'.$promo->id.'/de-activate');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_deactivate_promo_code_with_invalid_promo_id()
    {
        $response = $this->patch('/api/v1/promo/1/de-activate');

        $response->assertStatus(404);
    }
}
