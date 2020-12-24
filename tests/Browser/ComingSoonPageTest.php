<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ComingSoonPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function can_see_the_coming_soon_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->assertSee('Coming soon')
                ->assertSee('a website')
                ->assertSee('Notify Me')            ;
        });
    }

    /**
     * @test
     */
    public function can_subscribe()
    {
        $this->assertDatabaseCount('subscribers', 0);

        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->type('@email', 'foo@bar')
                ->click('@subscribe')
                ->waitFor('@thanks')
                ->assertSee('Thanks for subscribing.');
        });

        $this->assertDatabaseCount('subscribers', 1);
    }
}
