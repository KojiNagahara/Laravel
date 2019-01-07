<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'nickname' => $faker->firstName,
        'avatar_filename' => 'NoImage.png',
        'user_id' => 10001,
    ];
}, 'Profile Exists');

$factory->define(App\Profile::class, function (Faker $faker) {
    return null;
}, 'No Profile');
