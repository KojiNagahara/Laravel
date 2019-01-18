<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'nickname' => $faker->firstName,
        'avatar_filename' => 'NoImage.png',
    ];
}, 'Profile Exists');
