<?php


namespace Models\Products;


use App\Models\Products\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    public function testImage()
    {
        $image = Image::factory()->make([
            'url' => 'http://i.com/image.jpg'
        ]);

        $this->assertInstanceOf(Image::class, $image);

        $this->assertEquals('http://i.com/image.jpg', $image->url);
    }
}
