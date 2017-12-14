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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->firstName ." ". $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'access' => rand(1,6),
        'phone' => $faker->phoneNumber,
        'birthday' => $faker->dateTimeBetween('-40 years', '-18 years'),
        'hired_on' => $faker->dateTimeBetween('-10 years', '-14 days'),
        'has_cdl' => $faker->boolean($chanceOfGettingTrue = 50),
        'has_license' => $faker->boolean($chanceOfGettingTrue = 90),
        'license' => $faker->unique()->swiftBicNumber,
        'cdl_expire' => $faker->dateTimeBetween('now', '+2 years'),
        'active' => $faker->boolean($chanceOfGettingTrue = 90),
    ];
});
