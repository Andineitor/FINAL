<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function User_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'testt-password'),
        ]);

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(200)
                 ->assertJson([]);
    }

    /** @test */
    public function user_sin_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('test-password'),
        ]);

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => 'bad-password',
        ]);

        $response->assertStatus(401)
                 ->assertJson(['message' => "Cuenta o Password Invalido"]);
    }
}
