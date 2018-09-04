<?php

use Faker\Generator as Faker;

$factory->define(App\Quote::class, function (Faker $faker) {
    return [
        'quote_text' => $faker->text,
    ];
});
