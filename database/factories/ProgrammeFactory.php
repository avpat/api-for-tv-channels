<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Programme;
use App\Channel;
use Faker\Generator as Faker;

$factory->define(Programme::class, function (Faker $faker) {

    static $number = 1;

    return [
        'id' => $number++,
        'name' => $faker->word,
        'description'   => $faker->sentence,
        'thumbnail'  => $faker->imageUrl(),
        'start_time'    => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'end_time'  =>  \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'channel_id'    => Channel::all()->random()->id
    ];

});
