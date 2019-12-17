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
        $payload = [
            'client_id' => $this->faker->randomNumber,
            'client_secret' => $this->faker->word,
            'grant_type' => 'password',
            'username' => $this->faker->userName,
            'password' => $this->faker->password

        ];
        $response = $this->json($this->method, $this->endpoint, $payload);
        $response->assertStatus(401);
    }
}
