<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Maker::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'name' => $faker->name,
        'country' => $faker->country,
        'image_file' => $faker->slug,
    ];
});
