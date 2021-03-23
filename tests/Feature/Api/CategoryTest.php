<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Category;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_categories_list()
    {
        $categories = Category::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.categories.index'));

        $response->assertOk()->assertSee($categories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_category()
    {
        $data = Category::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.categories.store'), $data);

        $this->assertDatabaseHas('categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_category()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => $this->faker->sentence(10),
            'parent_id' => $this->faker->randomNumber,
        ];

        $response = $this->putJson(
            route('api.categories.update', $category),
            $data
        );

        $data['id'] = $category->id;

        $this->assertDatabaseHas('categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson(
            route('api.categories.destroy', $category)
        );

        $this->assertDeleted($category);

        $response->assertNoContent();
    }
}
