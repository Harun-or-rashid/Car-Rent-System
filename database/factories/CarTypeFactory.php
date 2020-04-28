<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CarType::class, function (Faker $faker) {
    return [
        //
        'name' => str_random('6'),
    ];
});
