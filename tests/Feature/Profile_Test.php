<?php

namespace Tests\Feature;

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Profile_Test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUpdate_Profile()
    {
        $post = Post::factory()->create();
        $id = $post->id;
        $this->json(
            'POST',
            "api/admin/update-user/{$id}",
            [
                'username' => 'Unit Test',
                'name' => 'Name Test',
                'phone' => '083135711',
                'email' => '1234@gnmail.com',
                'password' => '12345678',
                'Confirm_password' => '12345678'
            ],
        )->json(['status' => true]);
        $this->assertDatabaseHas('post', $post->toArray());
    }
}
