<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Models\OrderCommission::class, function (Faker $faker) {
    $users = User::pluck('id');
    $levels = [
        1 => '1',
        2 => '0.75',
        3 => '0.50',
        4 => '0.25',
        5 => '0.10'
    ];

    $user_id = $users[rand(1, count($users)-1)];
    $level = rand(1, 5);
    $percentage = $levels[$level];
    $order  = rand(100000, 10000000);
    $commission =  $percentage/100 * $order;

    return [
        'user_id' => $user_id,
        'order_id' => '14',
        'level' => $level,
        'percentage' => $percentage,
        'order_value' => $order,
        'commission' => $commission
    ];
});
