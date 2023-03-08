<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_register(): void
    {
        
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/admin/register')
                ->assertSee('Register')
                ->type('username', $user->username)
                ->type('email', $user->email)
                ->type('name', $user->name)
                ->type('password', $user->password)
                ->type('Confirm_password', $user->password)
                ->press('Register')
                ->assertPathIs('/admin/login');
        });
    }
}
