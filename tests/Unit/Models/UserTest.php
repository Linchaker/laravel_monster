<?php


namespace Models;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUser()
    {
        $user = User::factory()->make([
            'name' => 'John Dou'
        ]);

        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals('John Dou', $user->name);
    }
}
