<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class IssueTokenTEst extends TestCase
{
    protected $endpoint = 'api/v1/oauth/token';
    protected $method = 'POST';

    /**
     * @test
     */
    public function unauthorized_user_should_not_get_a_token()
    {
        $response = $this->json($this->method, $this->endpoint);
        $response->assertStatus(401);
    }
}
