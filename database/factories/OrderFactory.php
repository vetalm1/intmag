<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 7),
            'qty' => $this->faker->randomNumber(0),
            'total' => $this->faker->randomFloat(2, 0, 9999),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(14),
        ];
    }
}
