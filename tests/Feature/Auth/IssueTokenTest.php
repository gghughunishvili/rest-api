<?php

namespace Tests\Feature\Auth;

use App\Models\OauthClient;
use Tests\TestCase;

class IssueTokenTEst extends TestCase
{
    protected $endpoint = 'api/v1/oauth/token';
    protected $method = 'POST';
    protected $jsonStrucutre = [
        'access_token',
        'token_type',
        'expires_in',
    ];

    /**
     * @test
     */
    public function it_should_not_return_token_with_wrong_credentials()
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

    /**
     * @test
     */
    public function it_should_generate_client_credentials_token_with_correct_credentials()
    {
        $oauthClient = factory(OauthClient::class)->make([
            'personal_access_client' => true,
        ]);
        $oauthClient->save();
        $payload = [
            'client_id' => $oauthClient->id,
            'client_secret' => $oauthClient->secret,
            'grant_type' => 'client_credentials',
        ];
        $response = $this->json($this->method, $this->endpoint, $payload);
        $response->assertStatus(200);
        $response->assertJsonStructure($this->jsonStrucutre);
    }
}
