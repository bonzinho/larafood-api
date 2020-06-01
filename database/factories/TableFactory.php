<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Table::class, function (Faker $faker) {
    return [
        'tenant_id' => factory(\App\Models\Tenant::class),
        'uuid' => \Illuminate\Support\Str::random(5).uniqid(),
        'name' => $faker->name(),
        'description' => $faker->sentence,
    ];
});
