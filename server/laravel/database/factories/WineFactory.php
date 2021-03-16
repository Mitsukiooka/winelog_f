<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Wine::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'name' => $faker->randomElement(['赤ワイン', '白ワイン', 'ロゼワイン', 'スパークリングワイン']),
        'country' => $faker->randomElement(['フランス', 'イタリア', 'スペイン', 'チリ', 'アメリカ']),
        'kind' => $faker->randomElement(['赤', '白', 'スパークリング', 'ロゼ']),
        'type' => $faker->randomElement(['シャルドネ', 'リースリング', 'ピノノワール']),
        'image_file' => '',
        'area' => $faker->randomElement(['ナパ・バレー', 'ブルゴーニュ', 'シャンパーニュ']),
        'user_id' => $faker->randomElement([1, 2, 3])
    ];
});
