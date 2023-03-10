<?php

namespace Tests\Browser;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CRUDTagTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected $tag;

    public function setUp(): void
    {
        parent::setUp();
        $newTag = Tag::factory()->create();

        $this->tag = $newTag;
    }

    public function testCreate_Tag(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('Create Tag')
                ->type('title', $this->tag->name)
                ->press('Tạo')
                ->assertPathIs('/api/admin/create-tag');
        });
    }

    public function test_delete_tag(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('Thẻ')
                ->press('@delete-tag-' . $this->tag->id)
                ->assertPathIs('/api/admin/delete-tag/' . $this->tag->id);
        });
    }

    public function test_restore_tag(): void
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
                ->assertSee('Thẻ')
                ->press('@restore-post-'.$this->tag->id)
                ->assertPathIs('/dashboard');
        });
    }
}
