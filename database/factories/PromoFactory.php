<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $event = Event::factory()->create();
        return [
            'code' => $this->faker->bankAccountNumber,
            'radius' => $this->faker->numberBetween(2,500),
            'amount' => 5.00,
            'expire_at' => date("Y-m-d H:i:s", strtotime("+7 day")),
            'status' => $this->faker->numberBetween(0,1),
            'event_id' => $event->id,
        ];
    }
}
