<?php

namespace Database\Factories;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dish::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>'delicious dish',
            'description' => $this->faker->sentence(4),
            'price' =>$this->faker->numberBetween(2, 50),
            'image' =>'https://picsum.photos/200'
        ];
    }
}
