<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

use function PHPUnit\Framework\assertJson;

class DishTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_dishes()
    {
        $dishList = Dish::factory(4)->create();
        $response = $this->get('/api/dishes');

        $response->assertStatus(200);
        $response->assertJsonCount(4);
    }

    public function test_get_a_specific_dish()
    {
        $dish = Dish::factory()->create();
        $response = $this->get(route('show', $dish->id));
        $response->assertStatus(200);
        $response->assertJson(['id' => $dish->id,]);
    }

    public function test_can_create_dish()
    {
        $dish = [
            'name' => 'veggie Pizza',
            'description' => 'Pizza with roasted veggies',
            'price' => 12,
            'image' => 'https://picsum.photos/200'
        ];
        $response = $this->postJson(route('store'), $dish);
        $response->assertStatus(201);
        $response->assertJsonFragment($dish);
    
    }
    public function test_can_delete_dish()
    {
        $dish = Dish::factory()->create();
        
        $response = $this->delete(route('delete', $dish->id));
        $response->assertStatus(204);
        $this->assertDatabaseCount('dishes', 0);
    
    }

    public function test_can_update_dish()
    {
        Dish::factory()->create();
        $dish = [
            'name' => 'veggie Pizza',
            'description' => 'Pizza with roasted veggies',
            'price' => 12,
            'image' => 'https://picsum.photos/200'
        ];
        
        $response = $this->putJson(route('update', 1), $dish);
        $response->assertStatus(200);
        $this->assertDatabasehas('dishes', ['name' => 'veggie Pizza']);
    
    }
}
