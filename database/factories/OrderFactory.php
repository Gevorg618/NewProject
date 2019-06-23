<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Orders\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'invoice_number' => $faker->randomNumber(6),
        'customers' => $faker->name,
        'total_amount' => $faker->randomNumber(4),
        'status' => $faker->randomElement([Order::StatusNew, Order::StatusProcessed])
    ];
});
