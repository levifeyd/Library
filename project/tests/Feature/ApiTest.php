<?php

namespace Tests\Feature;

//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_index()
    {
        $a = 1;
        $this->assertEquals(1, $a);
        $response = $this->get('/login');
        $response->assertOk();
    }
    public function test_users_auth()
    {
        $user = User::query()->create([
            'name' => 'Test',
            'email' => 'qwer@mail.ru',
            'password' => 'qweasdzxc'
        ]);

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/login');
    }
    public function test_register() {
        $response = $this->post('/register',[
            'name' => 'Test',
            'email' => 'qwer@mail.ru',
            'password' => 'qweasdzxc',
            'password_confirmation'=>'qweasdzxc',
        ]);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'name'=>'Test',
        ]);
    }
}
