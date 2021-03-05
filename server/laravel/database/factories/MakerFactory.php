<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Maker::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'name' => $faker->randomElement(['ワインメーカー1', 'ワインメーカー2', 'ワインメーカー3', 'ワインメーカー4']),
        'country' => $faker->randomElement(['フランス', 'イタリア', 'スペイン', 'チリ', 'アメリカ']),
        'image_file' => $faker->slug,
    ];
});
