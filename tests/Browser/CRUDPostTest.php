<?php

namespace Tests\Browser;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CRUDPostTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_create_post(): void
    {
        $post = Post::factory()->create();

        $this->browse(function (Browser $browser) use ($post) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('Create post')
                ->type('title', $post->title)
                ->type('content', $post->content)
                ->attach('image', public_path('\anh\KM4FhE.jpg'))
                ->press('Thêm bài viết')
                ->assertPathIs('/api/admin/create-post');
        });
    }

//
    public function test_delete_post(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('Bài đăng')
                ->click('@delete-post(9)')
                ->assertPathIs('/api/admin/delete-post/9');
        });
    }

    public function test_show_post(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->visit('/')
                ->assertSee('Home')
                ->click('@detail-post(10)')
                ->assertPathIs('/detail-post/10');
        });
    }
}
