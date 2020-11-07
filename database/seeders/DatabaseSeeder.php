<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products\Product;
use App\Models\Products\Warehouse;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Product::factory(50)
            ->has(Warehouse::factory()->count(2))
            ->create();
        Warehouse::factory(1)->create();

    }
}
