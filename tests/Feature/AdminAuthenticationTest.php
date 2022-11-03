<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{

    public function test_example()
    {
        $this->unathenticated_admin_can_not_access_admin_routes();
        $this->admin_login_logout();
        $this->unathenticated_admin_can_not_access_admin_routes();
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    private function unathenticated_admin_can_not_access_admin_routes(): void
    {
        $response = $this->get('/admin/banners');
        $response->assertRedirect('/admin/login');
    }

    private function admin_login_logout(): void
    {
        $admin = Admin::factory()->create();
        $response = $this->post('/admin/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated('admin');
        $this->assertGuest('web');
//       $this->actingAs($admin)->get('/');
//        $this->assertGuest('web');
//       $this->actingAs($admin)->get('/admin/banners');
//
//        $this->actingAs($admin)->post('/admin/test');
//        $this->assertGuest('web');
        $response=$this->actingAs($admin)->post('/admin/logout');
        $response->assertRedirect('/');
//        $this->get('/admin/login');
//        $this->assertGuest('admin');
//        $this->assertGuest('web');

    }
}
