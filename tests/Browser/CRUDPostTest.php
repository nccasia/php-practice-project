<?php

namespace Tests\Browser;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CRUDPostTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected $post;

    public function setUp(): void
    {
        parent::setUp();
        $newPost = Post::factory()->create();

        $this->post = $newPost;
    }

    public function test_create_post(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('Create post')
                ->type('title', $this->post->title)
                ->type('content', $this->post->content)
                ->attach('image', public_path('\anh\KM4FhE.jpg'))
                ->press('Thêm bài viết')
                ->assertPathIs('/api/admin/create-post');
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
                ->click('@detail-post-' . $this->post->id)
                ->assertPathIs('/detail-post/' . $this->post->id);
        });
    }

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
                ->press('@delete-post-' . $this->post->id)
                ->assertPathIs('/api/admin/delete-post/' . $this->post->id);
        });
    }

    public function test_restore_post(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('Bài đăng')
                ->clickLink('Lịch sử')
                ->assertSee('Bài đăng')
                ->press('@restore-post-'.$this->post->id)
                ->assertPathIs('/dashboard');
        });
    }
}
