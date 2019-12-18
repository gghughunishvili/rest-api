<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\OauthClient;
use Faker\Generator as Faker;

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
