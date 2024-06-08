<?php

namespace Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterPageRendered(): void
    {
        $response = $this->get('/login');

        $response->assertOK();
    }

    public function testUserRegister(): void
    {
        $response = $this->post('/register', [
            'name' => 'User',
            'email' => 'email@email.com',
            'password' => 'q1w2e3r4t5y',
            'password_confirmation' => 'q1w2e3r4t5y',
        ]);
        $this->assertGuest();
        $response->assertRedirect('/login');
    }

    public function testRegistrationWithNonUniqueEmailError()
    {
        User::factory()->create([
            'name' => 'User',
            'email' => 'email@email.com',
            'password' => 'q1w2e3r4t5y',
        ]);

        $response = $this->post('/register', [
            'name' => 'User2',
            'email' => 'email@email.com',
            'password' => 'q1w2e3r4t5y',
            'password_confirmation' => 'q1w2e3r4t5y',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
