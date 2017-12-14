<?php

use Faker\Generator as Faker;

$factory->define(App\Dispatch::class, function (Faker $faker) {

    $status =  rand(0,3);
    $begin = $faker->dateTimeBetween('now', '+14 days');
    $start = $begin->format('Y-m-d 6:00:00');
    $stop = null;

    if($status>0) {
        $stop = $begin->format('Y-m-d 18:00:00');
    }
    return [
        'task_id' => App\Task::active()->get()->random()->id,
        'location' => $faker->lastname . " " . rand(1,42) . "-" . rand(1,42),
        'work_order' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'user_id' => App\User::active()->supervisor()->get()->random()->id,
        'client_id' => App\Client::active()->get()->random()->id,
        'start' => $start,
        'stop' => $stop,
        'status' => $status
    ];
});
