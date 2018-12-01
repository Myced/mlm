<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Admin\Product::class, function (Faker $faker) {
    return [
        'category_id' => 2,
        'brand_id' => 3,
        'code' => rand(700, 12000),
        'name' => $name = $faker->word(12),
        'slug' => $faker->slug,
        'price' => $faker->numberBetween(300, 900000),
        'quantity' => $faker->numberBetween(10, 200),
        'published' => $faker->boolean,
        'description' => $faker->text(400),
        'description_long' => $faker->paragraph(8),
        'thumbnail' => '/uploads/products/images/product.png',
        'image' => '/uploads/products/images/product.png',
    ];
});

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });
