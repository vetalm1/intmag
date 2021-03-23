<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(0, 5),
            'product_id' => $this->faker->numberBetween(0, 4),
            'qty' => $this->faker->randomNumber(0),
            'price' => $this->faker->randomFloat(2, 0, 9999),
        ];
    }
}
