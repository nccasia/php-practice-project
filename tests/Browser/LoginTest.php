<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_login_test(): void
    {
//        $user = User::factory()->create();
        $this->browse(function (Browser $browser){
            $browser->visit('/admin/login')
                ->assertSee('Sign In')
                ->type('username', 'lisieubquay1238')
                ->type('password', '12345678')
                ->press('Login')
                ->assertRouteIs('index');
        });
    }
}
