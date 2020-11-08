<?php


namespace Models\Products;


use App\Models\Products\Image;
use App\Models\Products\Product;
use App\Models\Products\Warehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testProduct()
    {
        $product = Product::factory()->make([
            'name' => 'Tesla'
        ]);

        $this->assertInstanceOf(Product::class, $product);

        $this->assertEquals('Tesla', $product->name);
    }

    public function testImageIsBelongsToProduct()
    {
        $image = Image::factory()->make();
        $product = Product::factory()->make(['image_id', $image->id]);

        $this->assertInstanceOf(Image::class, $product->image);
    }

    public function testProductBelongsToManyWarehouses()
    {
        $products = Product::factory()->make();
        Warehouse::factory()->make();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $products->warehouses);
    }
}
