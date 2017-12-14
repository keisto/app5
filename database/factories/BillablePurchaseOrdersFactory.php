<?php

use Faker\Generator as Faker;

$factory->define(App\BillablePurchaseOrder::class, function (Faker $faker) {
      $begin = $faker->dateTimeBetween('now', '+2 days');
      $end = $faker->dateTimeBetween($begin, '+5 days');
      return [
        'vendor' => $faker->randomElement($array = array ('Kuntz Sandblasting',
            'Titan Machinery','Runnings', 'Mac\'s', 'AirGas', 'Total Safety')),
        'description' => $faker->sentence,
        'user_id' => App\User::active()->employee()->get()->random()->id,
        'created_by' => App\User::active()->office()->get()->random()->id,
        'bill_to' =>  App\Client::active()->get()->random()->id,
        'begin_date' => $begin,
        'end_date' => $end,
        'status' => rand(0,3),
      ];
    });
