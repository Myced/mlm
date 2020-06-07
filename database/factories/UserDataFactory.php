<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserData::class, function (Faker $faker) {
    $codes = \App\Models\UserData::pluck('ref_code')->toArray();

    $user = \App\User::create([
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'level' => '1',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'
    ]);

    return [
        'user_id' => $user->id,
        'avatar' => \App\User::DEFAULT_AVATAR,
        'cookie' => str_random(32),
        'referred' => true,
        'referrer_code' => $codes[rand(0, count($codes)-1)],
        'ref_code' => rand(22222222, 99999999),
        'first_name' => $user->name,
        'region' => rand(1, 10),
        'email' => $user->email,
        'tel' => rand(700000000, 9000000000)
    ];
});
