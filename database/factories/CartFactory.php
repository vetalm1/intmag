<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 7),
            'identifier' => $this->faker->userName,
            'product_id' => $this->faker->numberBetween(0, 4),
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
