<?php

namespace Tests\Feature;

use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellerAuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->unathenticated_seller_can_not_access_seller_routes();
        $this->seller_login_logout();
       $this->unathenticated_seller_can_not_access_seller_routes();
        $response = $this->get('/seller/login');
        $response->assertStatus(200);
    }

    private function unathenticated_seller_can_not_access_seller_routes(): void
    {
        $response = $this->get('/seller/dashboard');
        $response->assertRedirect('/seller/login');
    }

    private function seller_login_logout(): void
    {
        $seller = Seller::factory()->create();
        $response = $this->post('/seller/login', [
            'email' => $seller->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated('seller');
        $this->assertGuest('web');
        $response=$this->actingAs($seller)->post('/seller/logout');
        $response->assertRedirect('/');
        $this->get('/seller/login');
        $this->assertGuest('seller');
        $this->assertGuest('web');

    }
}
