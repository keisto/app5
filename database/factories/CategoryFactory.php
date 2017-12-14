<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {

    // Employee == 1
    // Truck == 2
    // Trailer == 3
    // Equipment == 4
    // Tool == 5
    // Safety == 6
    // Purchase Order == 7
    // Other == 8

    return [
        'name' => $faker->unique()->randomElement($array = array ('Employee',
            'Truck','Trailer', 'Equipment', 'Tool', 'Safety', 'Purchase Order',
             'Other')),
        'active' => $faker->boolean($chanceOfGettingTrue = 100),
    ];
});
