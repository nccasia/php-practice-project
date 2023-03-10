<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MailTest extends DuskTestCase
{
    public function test_send_mail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('lisieubquay1238')
                ->clickLink('Gửi Email')
                ->assertRouteIs('mail')
                ->type('content', 'Hello World!')
                ->type('mail', 'kensu8434@gmail.com')
                ->press('Lưu')
                ->assertPathIs('/email');
        });
    }

    public function test_show_mail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index')
                ->assertSee('lisieubquay1238')
                ->clickLink('Gửi Email')
                ->assertRouteIs('mail')
                ->type('content', 'Hello World!')
                ->type('mail', 'kensu8434@gmail.com')
                ->press('Lưu')
                ->assertPathIs('/email');
        });
    }
}
