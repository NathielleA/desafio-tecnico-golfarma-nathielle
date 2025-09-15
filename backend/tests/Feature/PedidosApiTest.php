<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Teste',
            'email' => 'teste@email.com',
            'password' => '123456',
        ]);

        $response->assertStatus(201);
    }

    public function test_user_can_login_and_receive_token()
    {
        $user = User::factory()->create([
            'password' => bcrypt('123456'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => '123456',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['token']);
    }

    public function test_authenticated_user_can_create_order()
    {
        $user = User::factory()->create();
        $token = $user->createToken('api_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/api/orders', [
                             'cliente' => 'Maria',
                             'total' => 150.75,
                             'status' => 'pendente',
                         ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['cliente' => 'Maria']);
    }
}
