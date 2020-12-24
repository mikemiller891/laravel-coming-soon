<?php

namespace Tests\Feature;

use App\Http\Livewire\SubscriptionForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ComingSoonPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_see_the_coming_soon_page()
    {
        $response = $this->get('/');

        $response
            ->assertSeeInOrder(['Coming soon', 'a website', 'Enter your email address.', 'Notify Me']);
    }

    /**
     * @test
     */
    public function can_subscribe()
    {
        $this->assertDatabaseCount('subscribers', 0);

        Livewire::test(SubscriptionForm::class)
            ->set('email', 'foo@bar')
            ->call('subscribe')
            ->assertSee('Thanks for subscribing.');

        $this->assertDatabaseCount('subscribers', 1);
    }
}
