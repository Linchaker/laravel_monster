<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
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

        Warehouse::factory(10)
            ->state(new Sequence(
                ['active' => true],
                ['active' => false]
            ))
            ->hasAttached(
                Product::factory()->count(10),
                // seed pivot table additional field
                function () {
                    return ['active' => mt_rand(0,2) > 0];
                }
            )
            ->create()

        ;
        Warehouse::factory(1)->create();

    }
}
