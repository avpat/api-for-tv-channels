<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Channel;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'title' => $faker->word,
        'icon'  => $faker->imageUrl()
    ];
});
