<?php


namespace Tests\Feature\api\v1;


use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public function testApiGet()
    {
        $response = $this->get('/api/v1/products');

        $this->assertJson($response->content());
        $this->assertNotEmpty($response->content());
        $response->assertStatus(200);
    }
}
