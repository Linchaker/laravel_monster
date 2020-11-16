<?php


namespace Tests\Feature\api\v1;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testApiGet()
    {
        $response = $this->get('/api/v1/products');

        $this->assertJson($response->content());
        $this->assertNotEmpty($response->content());
        $response->assertStatus(200);
    }
}
