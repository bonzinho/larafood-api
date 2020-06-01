<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'tenant_id' => factory(\App\Models\Tenant::class),
        'identify' => uniqid() . \Illuminate\Support\Str::random(10),
        'total' => 80.0,
        'status' => 'open',
        'comment' => $faker->sentence,
    ];
});
