<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 2000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(5, 40),
        'user_id' => function() {
            return App\User::all()->random();   // Return a random user created by the User Factory
        }
    ];
});
