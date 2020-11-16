<?php

namespace Database\Factories\Products;

use App\Models\Products\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warehouse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            // part of warehouses will be not active
            'active' => mt_rand(0, 2) > 0,
        ];
    }
}
