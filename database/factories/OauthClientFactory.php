<?php

/** @var Factory $factory */

use App\Models\OauthClient;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(OauthClient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'secret' => $faker->password,
        'personal_access_client' => false,
        'password_client' => false,
        'redirect' => '/',
        'revoked' => false,
    ];
});

$factory->state(OauthClient::class, 'client_credentials', function () {
    return [
        'personal_access_client' => true,
    ];
});

$factory->state(OauthClient::class, 'password', function () {
    return [
        'password_client' => true,
    ];
});
