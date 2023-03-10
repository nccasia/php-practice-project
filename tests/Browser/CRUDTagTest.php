<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CRUDTagTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
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
                ->type('title', 'Pyhon')
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
                ->click('@detail-tag(4)')
                ->assertPathIs('/delete-tag/4');
        });
    }
}
