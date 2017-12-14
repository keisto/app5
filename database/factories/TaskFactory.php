<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array ('General Maintenance',
            'Treater PM','Flowtesting', 'Pumping Unit PM', 'Battery Construction')),
        'active' => $faker->boolean($chanceOfGettingTrue = 99),
    ];
});
