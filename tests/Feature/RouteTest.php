<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

//    public function test_example(): void
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }
//
//    public function setUp(): void
//    {
//        parent ::setUp();
//    }
//
//    public function tearDown(): void
//    {
//        parent::tearDown();
//    }

//    public function testIndex()
//    {
//        $this->get('/admin/Dashboard')->assertStatus(200);
//    }

    public function testLogin()
    {
        $this->get('/admin/login')->assertStatus(200);
    }

    public function test_get_user()
    {
        $this->get('api/admin/get-user')->assertJson(['status' => true]);
    }

    public function test_get_post()
    {
        $this->get('api/admin/get-post')->assertJson(['status' => true]);
    }

}
