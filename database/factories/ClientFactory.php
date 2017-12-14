<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    $company = $faker->unique()->randomElement($array = array ('Hess Corporation',
        'Whiting Oil','XTO Energy', 'Scout', 'Conoco Phillips'));
    $short = explode(' ', $company)[0];
    return [
        'client' => $company,
        'short' => $short,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zipcode' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'contract' => $faker->unique()->swiftBicNumber,
        'active' => $faker->boolean($chanceOfGettingTrue = 99),
    ];
});
