<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_search_test(): void
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
                ->select('tag_id','qqwe')
                ->press('Tìm')
                ->assertPathIs('/search');
        });
    }
}
