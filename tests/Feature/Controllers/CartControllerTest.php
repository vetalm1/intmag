<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Cart;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_carts()
    {
        $carts = Cart::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('carts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.carts.index')
            ->assertViewHas('carts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_cart()
    {
        $response = $this->get(route('carts.create'));

        $response->assertOk()->assertViewIs('app.carts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_cart()
    {
        $data = Cart::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('carts.store'), $data);

        $this->assertDatabaseHas('carts', $data);

        $cart = Cart::latest('id')->first();

        $response->assertRedirect(route('carts.edit', $cart));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_cart()
    {
        $cart = Cart::factory()->create();

        $response = $this->get(route('carts.show', $cart));

        $response
            ->assertOk()
            ->assertViewIs('app.carts.show')
            ->assertViewHas('cart');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_cart()
    {
        $cart = Cart::factory()->create();

        $response = $this->get(route('carts.edit', $cart));

        $response
            ->assertOk()
            ->assertViewIs('app.carts.edit')
            ->assertViewHas('cart');
    }

    /**
     * @test
     */
    public function it_updates_the_cart()
    {
        $cart = Cart::factory()->create();

        $data = [
            'user_id' => $this->faker->word,
            'identifier' => $this->faker->userName,
            'product_id' => $this->faker->word,
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'quantity' => $this->faker->randomNumber,
        ];

        $response = $this->put(route('carts.update', $cart), $data);

        $data['id'] = $cart->id;

        $this->assertDatabaseHas('carts', $data);

        $response->assertRedirect(route('carts.edit', $cart));
    }

    /**
     * @test
     */
    public function it_deletes_the_cart()
    {
        $cart = Cart::factory()->create();

        $response = $this->delete(route('carts.destroy', $cart));

        $response->assertRedirect(route('carts.index'));

        $this->assertDeleted($cart);
    }
}
