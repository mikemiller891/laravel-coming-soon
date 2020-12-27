<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * @test
     */
    public function it_passes_the_health_check()
    {
        $response = $this->get('/health');

        $response
            ->assertSee(
                '{"status":"OK","log":{"status":"OK"},"database":{"status":"OK"},"env":{"status":"OK"}}',
                false
            );
    }
}
