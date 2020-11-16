<?php


namespace Models\Products;


use App\Models\Products\Product;
use App\Models\Products\Warehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WarehouseTest extends TestCase
{
    use RefreshDatabase;

    public function testWarehouse()
    {
        $warehouse = Warehouse::factory()->make([
            'name' => 'Stock'
        ]);

        $this->assertInstanceOf(Warehouse::class, $warehouse);

        $this->assertEquals('Stock', $warehouse->name);
    }

    public function testProductBelongsToManyWarehouses()
    {
        $warehouses = Warehouse::factory()->make();
        Product::factory()->make();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $warehouses->products);
    }
}
