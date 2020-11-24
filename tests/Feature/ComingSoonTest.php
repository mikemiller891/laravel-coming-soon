<?php

namespace Tests\Feature;

use App\Http\Livewire\SubscriptionForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ComingSoonTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * @test
     */
    public function visitor_can_see_the_coming_soon_page()
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('coming-soon')
            ->assertSee('<title>'.config('app.name').'</title>', false);
    }

    /**
     * @test
     */
    public function visitor_can_subscribe()
    {
        $this->assertDatabaseCount('visitors', 0);

        $email = $this->faker->email;

        Livewire::test(SubscriptionForm::class)
            ->set('email', $email)
            ->call('subscribe');

        $this->assertDatabaseCount('visitors', 1);
    }
}
