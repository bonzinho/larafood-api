<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'tenant_id' => factory(\App\Models\Tenant::class),
        'name' => $faker->unique()->name,
        'description' => $faker->sentence,
        'image' => $faker->imageUrl(),
        'price' => 12.9
    ];
});
