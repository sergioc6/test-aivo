<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTwitterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApiTwitter()
    {
        $response = $this->json('GET', '/api/get_tweets', ['twitter_account' => 'manuginobili']);

        $response
            ->assertStatus(200);
    }
    
}
