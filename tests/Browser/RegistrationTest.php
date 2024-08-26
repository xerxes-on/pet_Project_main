<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Sleep;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function test_password_validation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register');

            $browser->typeSlowly('name', 'Dummy User');
            $browser->typeSlowly('email', 'iam@example.com');
            $browser->type('password', 'ooo');
            $browser->type('password_confirmation', 'ooo');
            $browser->press('@register');

            $browser->assertSee('8 characters');

            $user = User::factory()->create([
                'password' => Hash::make('secret'),
            ]);

            $browser->visit('/login')
                ->typeSlowly('email', $user->email)
                ->typeSlowly('password', 'secret')
                ->press('@login');
            Sleep::for(5)->second();
            $browser->assertPathIs('/dashboard');

        });

    }
}
