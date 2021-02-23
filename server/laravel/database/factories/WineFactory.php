<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Wine::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'name' => $faker->name,
        'country' => $faker->country,
        'kind' => $faker->randomElement(['赤', '白', 'スパークリング', 'ロゼ']),
        'type' => $faker->randomElement(['シャルドネ', 'リースリング', 'ピノノワール'])//
    ];
});
