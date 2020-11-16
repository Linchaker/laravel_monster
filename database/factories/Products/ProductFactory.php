<?php

namespace Database\Factories\Products;

use App\Models\Products\Image;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(7),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(),
            'image_id' => Image::factory(),
        ];
    }
}
