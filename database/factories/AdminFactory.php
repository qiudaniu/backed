<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'account' => $faker->name,
        'password' => '6ebe76c9fb411be97b3b0d48b791a7c9', // secret
        'remember_token' => str_random(10),
    ];
});
