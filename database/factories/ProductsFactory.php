<?php

use Faker\Generator as Faker;

$factory->define(App\Admin\Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(0, 7),
        'brand_id' => rand(0, 11),
        'code' => rand(700, 12000),
        'name' => $name = $faker->word(12),
        'slug' => $faker->slug,
        'price' => $faker->numberBetween(300, 900000),
        'quantity' => $faker->numberBetween(10, 200),
        'published' => $faker->boolean,
        'description' => $faker->text(400),
        'description_long' => $faker->paragraph(8),
        'thumbnail' => '/uploads/products/thumbnails/product.png',
        'image' => '/uploads/products/images/product.png',
    ];
});
