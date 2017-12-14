<?php

use Faker\Generator as Faker;

$factory->define(App\NonBillablePurchaseOrder::class, function (Faker $faker) {
      return [
        'vendor' => $faker->randomElement($array = array ('Dickinson Auto',
            'NorthWest Tire','Runnings', 'Mac\'s', 'Ace Hardware', 'Total Safety')),
        'description' => $faker->sentence,
        'user_id' => App\User::all()->random()->id,
        'created_by' => App\User::all()->random()->id,
        'asset_id' => $faker->buildingNumber,
        'other' => $faker->name,
        'cost' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        'status' => rand(0,3),
      ];
    });
